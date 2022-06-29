<?php

use CastingteamBundle\Entity\Selection;

class Api_Selection extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Core_Exception
     * @throws Exception_MissedParameter
     */
    public function recreate(Http_Request $request)
    {
        $recreatableSelection = $this->getController()->getSelectionByCode($this->getValueOrThrowException($request->getPost(),'selection_code'));

        $selectionId = $this->getController()->createSelection([
            'selection_type' => 'user_selection',
            'name' => $recreatableSelection[0]['name']
        ]);

        if ($this->isLogged()) {
            $this->getController()->addSelectionToUser(
                [
                    'selection_id' => $selectionId,
                    'user_id' => $request->getSession()[SESSION_NAME_SITE_LOGIN]
                ]
            );
        } else {
            $_SESSION['SELECTIONS'][] = [
                'id' => $selectionId,
                'code' => $this->getController()->getSelectionById($selectionId)[0]['code'],
                'name' => $this->getController()->getSelectionById($selectionId)[0]['name'],
                'creation_date' => strftime("%A %e %B %Y"),
            ];
        }

        $models = $this->getController()->getModelsBySelection($recreatableSelection[0]['id']);

        if (
            $models &&
            count($models)
        ) {
            foreach ($models as $model) {
                $this->controller->addModelToSelection([
                    'model_id' => $model['id_model'],
                    'selection_id' => $selectionId
                ]);
            }

            $response = [
                'error' => false,
                'message' => 'Selection recreated',
                'data' =>
                    [
                        'selection' =>
                            [
                                'id' => $selectionId,
                                'code' => $this->getController()->getSelectionById($selectionId)[0]['code']
                            ]
                    ]
            ];
        } else {
            throw new Core_Exception('No models to add');
        }

        return
            Http_Response::create(
                json_encode($response),
                Enum_HttpStatusCode::HTTP_OK,
                ['Content-Type' => 'application/json']
            );
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     * @throws Exception_Internal
     */
    public function add(Http_Request $request)
    {
        if ($this->isLogged()) {
            $userId = (new Core_SessionHandler())->get(SESSION_NAME_SITE_LOGIN);

            if (!empty($request->getPost()['selection_id'])) {
                $this->controller->addModelToSelection($request->getPost());
            } elseif (!empty($request->getPost()['selection_title'])) {
                $data = [
                    'name' => $this->getValueOrThrowException($request->getPost(), 'selection_title'),
                    'model_id' => $this->getValueOrThrowException($request->getPost(), 'model_id'),
                ];

                $result = $this->controller->createSelection($data);

                if (!$result) {
                    throw new Exception_Internal();
                }

                $data = array_merge(
                    $data,
                    [
                        'selection_id' => $result,
                        'user_id' => $userId,
                    ]
                );

                $this->controller->addModelToSelection($data);
                $this->controller->addSelectionToUser($data);
            }

            $response = $this->controller->getUserSelections($userId);
        } else {
            if (!empty($request->getPost()['selection_id'])) {
                $this->controller->addModelToSelection(
                    [
                        'selection_id' => $this->getValueOrThrowException($request->getPost(), 'selection_id'),
                        'model_id'=> $this->getValueOrThrowException($request->getPost(), 'model_id'),
                    ]
                );
            } elseif (!empty($request->getPost()['selection_title'])) {
                $data = [
                    'name' => $this->getValueOrThrowException($request->getPost(), 'selection_title'),
                    'model_id' => $this->getValueOrThrowException($request->getPost(), 'model_id'),
                ];

                $result = $this->controller->createSelection($data);

                $data['selection_id'] = $result;
                $this->controller->addModelToSelection($data);

                (new Core_SessionHandler())->set(
                    'SELECTIONS',
                    array_merge(
                        [
                            [
                                'id' => $data['selection_id'],
                                'name' => $data['name'],
                                'creation_date' => strftime("%A %e %B %Y"),
                            ]
                        ],
                        !empty((new Core_SessionHandler())->get('SELECTIONS'))
                            ? (new Core_SessionHandler())->get('SELECTIONS')
                            : []
                    )
                );
            }

            $response = (new Core_SessionHandler())->get('SELECTIONS');
        }

        $language = (new Core_SessionHandler())->get('lang');
        $message = 'Selection created';

        if ($language == Enum_Language::DE) {
            $message = 'Model is toegevoegd aan je selectie.';
        } elseif (($language == Enum_Language::EN) || ($language == Enum_Language::NL)) {
            $message = 'Model has been added to your selection.';
        } elseif ($language == Enum_Language::FR) {
            $message = 'Le modèle a été ajouté à votre sélection.';
        }

        return
            new Http_JsonResponse(
                [
                    'error' => false,
                    'message' => $message,
                    'data' => $response,
                    'count' => count((new Repository_Model())->findAllBySelections(
                        array_map(
                            function (array $selection) {
                                return new Entity_Selection($selection['id']);
                            },
                            $response
                        )
                    )),
                ]
            );
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     */
    public function delete(Http_Request $request)
    {
        if (
            $this->isAdmin() ||
            $this->isUserSelection($request)
        ) {
            (new Entity_Selection($this->getValueOrThrowException($request->getPost(), 'id')))->remove();

            return new Http_Response(
                [
                    'error' => false,
                    'message' => 'Selection deleted'
                ]
            );
        }
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     * @throws Exception_Security
     * @throws Exception_Internal
     */
    public function edit(Http_Request $request)
    {
        if ($this->isUserSelection($request)) {
            $result = $this->getController()->updateSelection(
                [
                    'id' => $this->getValueOrThrowException($request->getPost(), 'id'),
                    'name' => $this->getValueOrThrowException($request->getPost(), 'name')
                ]
            );

            if ($result) {
                $response = [
                    'error' => false,
                    'message' => 'Selection updated'
                ];

                return
                    Http_Response::create(
                        json_encode($response),
                        Enum_HttpStatusCode::HTTP_OK,
                        ['Content-Type' => 'application/json']
                    );
            } else {
                throw new Exception_Internal();
            }
        } else {
            throw new Exception_Security();
        }
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_MissedParameter
     * @throws Exception_Security
     * @throws Exception_Internal
     */
    public function addModels(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $selection = $this->entityFactory->selection()->findOneById($this->getValueOrThrowException($request->getPost(), 'selection'));
            $models = explode(
                ' ',
                preg_replace('/(\s+|\n)/ui', ' ', $this->getValueOrThrowException($request->getPost(), 'models'))
            );
            /** @var Selection $selection */

            if ($selection && count($models)) {
                foreach ($models as $model) {
                    if (is_numeric($model)) {
                        $model = $this->entityFactory->model()->findOneById($model);

                        if ($model && !$selection->isContain($model)) {
                            $selection->addModel($model);
                        }
                    }
                }

                $this->entityManager->flush();

                $response = [
                    'error' => false,
                    'message' => 'Selection updated'
                ];

                return
                    Http_Response::create(
                        json_encode($response),
                        Enum_HttpStatusCode::HTTP_OK,
                        ['Content-Type' => 'application/json']
                    );
            } else {
                throw new Exception_Internal();
            }
        } else {
            throw new Exception_Security();
        }
    }

    /**
     * @param Http_Request $request
     * @return bool
     */
    private function isUserSelection(Http_Request $request)
    {
        if (
            $this->isLogged() &&
            $this->getController()->checkIsUserSelection(
                [
                    'user_id' => $this->getValueOrThrowException($request->getSession(), SESSION_NAME_SITE_LOGIN),
                    'selection_id' => $this->getValueOrThrowException($request->getPost(), 'id')
                ]
            )
        ) {
            return true;
        } else if (count($request->getSession()['SELECTIONS'])) {
            foreach ($request->getSession()['SELECTIONS'] as $selection) {
                if ($request->getPost()['id'] == $selection['id']) {
                    return true;
                }
            }
        }

        return false;
    }
}
