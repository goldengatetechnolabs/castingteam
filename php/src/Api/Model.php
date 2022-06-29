<?php

use CastingteamBundle\Entity;

class Api_Model extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_DataNotFound
     * @throws Exception_MissedParameter
     */
    public function get(Http_Request $request)
    {
        if (!empty($request->getPost()['group'])) {
            $groupId = $request->getPost()['group'];
            $groups[] = new Entity_Group($groupId);
        } else {
            $groups = (new Repository_Group())->findAllBorderfield();
            $groupId = 0;
        }

        if (!empty($request->getPost()['selection'])) {
            $models = (new Repository_Model())->findActiveByGroupsAndSelectionsWithLimit(
                $groups,
                [(new Repository_Selection())->findOneByCode($request->getPost()['selection'])],
                $this->getValueOrElse($request->getPost(), 'from', 0),
                $this->getValueOrElse($request->getPost(), 'to', 20)
            );
        } else {
            $models = (new Repository_Model())->findActiveByGroupsWithLimit(
                $groups,
                $this->getValueOrElse($request->getPost(), 'from', 0),
                $this->getValueOrElse($request->getPost(), 'to', 20)
            );
        }

        return
            new Http_JsonResponse(
                [
                    'error' => false,
                    'data' => array_map(
                        function(Entity_Model $model) use ($groupId) {
                            $modelEntity = $this->entityFactory->model()->findOneById($model->getId());

                            $this->updatePhotos($model->getId());

                            if ($groupId > 0) {
                                $groupEntity = $this->entityFactory->group()->findOneById($groupId);
                                $siteImages = $this->entityFactory->siteImage()->findAllActiveByGroupAndModelAsArray($modelEntity, $groupEntity);
                            } else {
                                $siteImages = $this->entityFactory->siteImage()->findAllActiveByModelAsArray($modelEntity);
                            }

                            $siteImages = $this->filterBigImages($siteImages, $model->getId());

                            return [
                                'id' => $model->getId(),
                                'name' => $model->getName(),
                                'image' => isset($siteImages[0]) ? sprintf('models/%s/website/middle/%s.jpg', $model->getId(), $siteImages[0]['id']) : '',
                                'images' => array_map(
                                    function (Entity_Image $image) {
                                        return $image->getLinkSmall();
                                    },
                                    $model->getBigImages()
                                ),
                                'height' => $model->getLength(),
                                'chest' => $model->getChest(),
                                'waist' => $model->getWaist(),
                                'hips' => $model->getHips(),
                                'clothing_size' => $model->getClothingSize(),
                                'jeans' => $model->getJeans(),
                                'shoes' => $model->getShoeSize(),
                            ];
                        },
                        $models
                    ),
                ]
            );
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_DataNotFound
     * @throws Exception_MissedParameter
     */
    public function overview(Http_Request $request)
    {
        $modelId = $this->getValueOrThrowException($request->getPost(), 'model_id');
        $currentGroupId = $this->getValueOrElse($request->getPost(), 'group', 0);
        $model = $this->getController()->getModel($modelId);

        $modelEntity = $this->entityFactory->model()->findOneById($modelId);

        if ($currentGroupId > 0) {
            $groupEntity = $this->entityFactory->group()->findOneById($currentGroupId);
            $siteImages = $this->entityFactory->siteImage()->findAllActiveByGroupAndModelAsArray($modelEntity, $groupEntity);
        } else {
            $siteImages = $this->entityFactory->siteImage()->findAllActiveByModelAsArray($modelEntity);
        }

        if (!$model) {
            throw new Exception_DataNotFound();
        }

        $this->getSmarty()->assign('model', $model);

        $selections = [];

        
        if ($this->isLogged()) {
            $selections = (new Repository_Selection())->findAllByUser(new Entity_User($request->getSession()[SESSION_NAME_SITE_LOGIN]));
        } elseif (!empty($request->getSession()['SELECTIONS'])) {
            foreach ($request->getSession()['SELECTIONS'] as $selection) {
                $selections[] = new Entity_Selection($selection['id']);
            }
        }                
        
        
        if (Enum_Site::borderfield() != $request->getSiteType()) {    
            $this->getSmarty()->assign(
                'taalContent',
                Localization_Resolver::create()->resolve($this->getValueOrElse($request->getPost(), 'lang', ''))
            );        
        }                

        if (Enum_Site::borderfield() == $request->getSiteType()) {
            $siteImages = $this->filterBigImages($siteImages, $modelId);
            $template = 'borderfield/single_model.tpl';
        } else {
            $template = 'site/single_model.tpl';
        }

        $this->getSmarty()->assign('modelEntity', new Entity_Model($modelId));
        $this->getSmarty()->assign('siteImages', $siteImages);
        $this->getSmarty()->assign('selections', $selections);

        return
            Http_Response::create(
                $this->getSmarty()->fetch($template),
                Enum_HttpStatusCode::HTTP_OK
            );
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function status(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $modelId = $this->getValueOrThrowException($request->getPost(), 'id');
            $status = $this->getValueOrThrowException($request->getPost(), 'status');

            if (
                $status == 1 ||
                $status == 4
            ) {

                if ($modelId > 100000) {
                    $nextModelId = $this->getController()->getNextModelId();
                }

                if (isset($nextModelId)) {
                    $update = sprintf('model_id =%s, accepted = 1, is_update = 0, declined = 0 ', $nextModelId);
                } else {
                    $update = " accepted = 1, is_update = 0, declined = 0 ";
                }

            } elseif ($status == 2) {
                $update = ' accepted = 0, is_update = 0, declined = 1 ';
            } elseif ($status == 0) {
                $update = ' accepted = 0, is_update	= 0, declined = 1 ';
            } elseif ($status == 3) {
                $update = ' is_update = 0 ';
            } elseif ($status == 4) {
                $update = ' accepted = 1, is_update = 0, declined = 0 ';
            } elseif ($status == 5) {
                $update = ' accepted = 0, is_update = 0, declined = 2 ';
            } else {
                $update = '';
            }

            $this->getController()->updateModelStatus($update, $modelId);

            if (
                ($status == 1 || $status == 4) &&
                isset($nextModelId)
            ) {
                Flight::db()->query("UPDATE modelcategory SET model_id =" . $nextModelId . " WHERE model_id=" . $modelId);
                Flight::db()->query("UPDATE model_groepen SET id_model=" . $nextModelId . " WHERE id_model=" . $modelId);
                Flight::db()->query("UPDATE model_images SET id_model=" . $nextModelId . " WHERE id_model=" . $modelId);
                Flight::db()->query("UPDATE model_site_images SET id_model=" . $nextModelId . " WHERE id_model=" . $modelId);
                Flight::db()->query("UPDATE selecties_models SET id_model=" . $nextModelId . " WHERE id_model=" . $modelId);
                Flight::db()->query("UPDATE model_videos SET model_id=" . $nextModelId . " WHERE model_id=" . $modelId);
                Flight::db()->query("UPDATE _log SET id_model=" . $nextModelId . " WHERE id_model=" . $modelId);
                rename($_SERVER['DOCUMENT_ROOT'] . "/models/" . $modelId, $_SERVER['DOCUMENT_ROOT'] . "/models/" . $nextModelId);

                $modelSend = $this->getController()->getModelById($nextModelId);

                if (ENVIRONMENT == Enum_Environment::PRODUCTION) {
                    (new Synchronizer_Composite())->synchronize(
                        sprintf(
                            "INSERT INTO `model`(`model_id`, `naam`, `voornaam`, `geslacht`, `geboortedatum`, `lengte`, `gewicht`, `straat`, `nummer`, `provincie`, `gemeente`, `postcode`, `beroep`, `studierichting`, `telefoon`, `gsm`, `email`, `homepage`, `ervaring_1`, `ervaring_2`, `ervaring_3`, `ervaring_4`, `ervaring_5`, `ervaring_6`, `ervaring_7`, `ervaring_8`, `maten_schoenen`, `maten_borst`, `maten_taille`, `maten_heupen`, `maten_cup`, `maten_kleding`, `maten_kostuum`, `maten_jeans`, `code`, `datum`, `updated`, `catmodel`, `land`) VALUES ('%s','%s','%s','%s','%s','','','%s','%s',0,'%s','','','','%s','%s','%s','','','','','','','','','','','','','','','','','','%s','%s','%s',0,'')",
                            $modelSend['model_id'],
                            $modelSend['naam'],
                            $modelSend['voornaam'],
                            $modelSend['geslacht'],
                            $modelSend['geboortedatum'],
                            $modelSend['straat'],
                            $modelSend['nummer'],
                            $modelSend['gemeente'],
                            $modelSend['telefoon'],
                            $modelSend['gsm'],
                            $modelSend['email'],
                            $modelSend['code'],
                            $modelSend['datum'],
                            $modelSend['updated']
                        )
                    );
                }

                $user = new Entity_Model($nextModelId);
                $email = (new Repository_Email())->findByCode(Enum_EmailCode::MODEL_ACCEPTED);

                (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);
            }

            if ($status == 2) {
                $user = new Entity_Model($modelId);
                $email = (new Repository_Email())->findByCode(Enum_EmailCode::MODEL_REJECTED);

                (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);
            }

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'message' => 'status updated'
                        ]
                    )
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_DataNotFound
     */
    public function delete(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $id = $this->getValueOrThrowException($request->getPost(), 'id');
            $entity = $this->entityFactory->model()->findOneById($id);

            if (!$entity) {
                throw new Exception_DataNotFound('Model not found');
            }

            $this->entityManager->remove($entity);
            $this->entityManager->flush();

            deleteDirectory('models/' . $id);

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'model removed'
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     * @throws Exception_InvalidValue
     */
    public function update(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $model = new Entity_Model($this->getValueOrThrowException($request->getPost(), 'id'));
            $target = $this->getValueOrThrowException($request->getPost(), 'target');
            $targetValue = $this->getValueOrThrowException($request->getPost(), 'value');
            $setMethod = sprintf('set%s', ucfirst($target));
            $getMethod = sprintf('get%s', ucfirst($target));

            if (
                !method_exists($model, $setMethod) ||
                !method_exists($model, $getMethod)
            ) {
                throw new Exception_InvalidValue();
            }

            $this->logAction(
                $model,
                'Updated information about {name} {surname} ref. {modelId} : {oldValue} -> {newValue}',
                [
                    '{oldValue}' => $model->$getMethod(),
                    '{newValue}' => $targetValue,
                ]
            );

            $model->$setMethod($targetValue)->update();

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Information updated',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_JsonResponse
     * @throws Exception_Security
     */
    public function email(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $model = (new Entity_Model($this->getValueOrThrowException($request->getPost(), 'id')));
            $this->logAction(
                $model,
                'Asked for information about {name} {surname} ref. {modelId} : {modelData}',
                ['{modelData}' => $model->getEmail()]
            );

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'data' => [
                            'email' => $model->getEmail(),
                        ],
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_JsonResponse
     * @throws Exception_Security
     */
    public function phone(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $model = (new Entity_Model($this->getValueOrThrowException($request->getPost(), 'id')));
            $this->logAction(
                $model,
                'Asked for information about {name} {surname} ref. {modelId} : {modelData}',
                ['{modelData}' => $model->getPhone()]
            );

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'data' => [
                            'phone' => $model->getPhone(),
                        ],
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Entity_Model $model
     * @param string $messageTemplate
     * @param string[] $additionalInfo
     * @return void
     */
    private function logAction(Entity_Model $model, $messageTemplate, array $additionalInfo)
    {
        (new Entity_AccessLog())
            ->setPerson($this->account->get())
            ->setMessage(
                strtr(
                    $messageTemplate,
                    array_merge(
                        [
                            '{name}' => $model->getName(),
                            '{surname}' => $model->getSurname(),
                            '{modelId}' => $model->getId(),
                        ],
                        $additionalInfo
                    )
                )
            )
            ->create()
        ;
    }

    /**
     * @param array $images
     * @param string $modelId
     * @return array
     */
    private function filterBigImages(array $images, $modelId)
    {
        $filtered = [];

        foreach ($images as $image) {
            if (file_exists(sprintf('models/%s/website/middle/%s.jpg', $modelId, $image['id']))) {
                $filtered[] = $image;
            }
        }

        return $filtered;
    }

    /**
     * @param string $id
     */
    private function updatePhotos($id) {
        $entity = $this->entityFactory->model()->findOneById($id);

        if (!is_null($entity)) {
            /** @var Entity\Model $entity */
            $category = $this->entityFactory->category()->findOneByName('Bordermodels');
            $groups = $this->entityFactory->group()->findAllByModelAndCategory($category, $entity);
            $images = $this->entityFactory->siteImage()->findAllByModel($entity);

            foreach ($images as $image) {
                foreach ($groups as $group) {
                    $entitySiteImageGroup = $this->entityFactory->siteImageGroup()->findOneByImageAndGroup($image, $group);
                    /** @var Entity\SiteImageGroup $entitySiteImageGroup */
                    /** @var Entity\SiteImage $image */

                    if (is_null($entitySiteImageGroup)) {
                        $entitySiteImageGroup = (new Entity\SiteImageGroup())
                            ->setPdf($image->getPdf())
                            ->setOnline($image->getOnline())
                            ->setPosition($image->getOrder())
                            ->setSiteImage($image)
                            ->setGroup($group);

                        $this->entityManager->persist($entitySiteImageGroup);
                    }
                }
            }

            $this->entityManager->flush();
        }
    }
}
