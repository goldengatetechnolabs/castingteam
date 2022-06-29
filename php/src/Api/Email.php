<?php

use CastingteamBundle\Entity\FromEmail;

class Api_Email extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     * @throws Exception_Security
     */
    public function get(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $mail = new Entity_Email($this->getValueOrThrowException($request->getPost(), 'id'));
            $language = Enum_Language::create($this->getValueOrElse($request->getPost(), 'language', ''));

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'data' =>
                                [
                                    'id' => $mail->getId(),
                                    'title' => $mail->getTitle(),
                                    'subject' => $mail->getSubject(!empty($language->getValue()) ? $language : null),
                                    'content' => $mail->getContent(!empty($language->getValue()) ? $language : null),
                                    'code' => $mail->getCode(),
                                ]
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
     */
    public function update(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $mail = new Entity_Email($this->getValueOrThrowException($request->getPost(), 'id'));
            $mail->setTitle($this->getValueOrThrowException($request->getPost(), 'title'));

            foreach ($this->arrangeArrayFromContainer($request->getPost(), 'subject') as $key => $value) {
                $mail->setSubject($value, Enum_Language::create($key));
            }

            foreach ($this->arrangeArrayFromContainer($request->getPost(), 'content') as $key => $value) {
                $mail->setContent($value, Enum_Language::create($key));
            }

            $mail->update();

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'function' => 'close_popup()',
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
     */
    public function add(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $mail = new Entity_Email($this->getValueOrElse($request->getPost(), 'language', Enum_Language::DEFAULT_LANGUAGE));

            $mail
                ->setTitle($this->getValueOrThrowException($request->getPost(), 'title'))
                ->setCode($this->getValueOrElse($request->getPost(), 'code', ''))
            ;

            foreach ($this->arrangeArrayFromContainer($request->getPost(), 'subject') as $key => $value) {
                $mail->setSubject($value, Enum_Language::create($key));
            }

            foreach ($this->arrangeArrayFromContainer($request->getPost(), 'content') as $key => $value) {
                $mail->setContent($value, Enum_Language::create($key));
            }

            $mail->create();

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'function' => 'close_popup()',
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
     */
    public function remove(Http_Request $request)
    {
        if ($this->isAdmin()) {
            (new Entity_Email($this->getValueOrThrowException($request->getPost(), 'id')))->remove();

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'message' => 'mail removed'
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
     * @throws Exception_Internal
     */
    public function send(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $email = new Entity_Email($this->getValueOrThrowException($request->getPost(), 'mail_id'));
            $emailFrom = $this->entityFactory->fromEmail()->findOneById($this->getValueOrThrowException($request->getPost(), 'mail_from'));
            /** @var FromEmail $emailFrom */

            if (!$emailFrom) {
                throw new Exception_Internal('Email from is required');
            }

            if ($this->getValueOrElse($request->getPost(), 'send_message_id', false)) {
                $selection = new Entity_Selection($this->getValueOrThrowException($request->getPost(), 'send_message_id'));

                foreach ($selection->getModels() as $model) {
                    if ($model->isActive()) {
                        $this->sendToUser($model, $email, $request, $emailFrom->getAddress());
                    }
                }
            } else {
                if ($this->getValueOrElse($request->getPost(), 'user_type', Enum_UserType::MODEL) == Enum_UserType::MODEL) {
                    $user = new Entity_Model($this->getValueOrThrowException($request->getPost(), 'model_id'));
                } else {
                    $user = new Entity_User($this->getValueOrThrowException($request->getPost(), 'model_id'));
                }

                $this->sendToUser($user, $email, $request, $emailFrom->getAddress());
            }

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'message' => 'success',
                            'success' => 1,
                            'bericht' => "Email sent.",
                            'function' => 'close_popup()',
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
     */
    public function test(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $mail = new Entity_Email($this->getValueOrThrowException($request->getPost(), 'id'));
            $list = Enum_Language::getList();
            array_pop($list);
            $user = (new Entity_Model());
            $user
                ->setEmail(Enum_Mail::CUSTOM_REPLY)
                ->setName(Enum_Mock::MOCK)
                ->setPassword(Enum_Mock::MOCK)
                ->setSurname(Enum_Mock::MOCK)
                ->setId(0)
            ;

            foreach ($list as $language) {
                $user->setLanguage(Enum_Language::create($language));

                if ($mail->isContentExists($language)) {
                    $this->sendToUser($user, $mail, $request);
                }
            }

            return
                new Http_Response(
                    json_encode(
                        [
                            'error' => false,
                            'message' => 'Mails sent.',
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
     * @throws Exception_Internal
     */
    public function addFrom(Http_Request $request)
    {
        if ($this->isAdmin()) {
            $address = $this->getValueOrThrowException($request->getPost(), 'address');

            if ($this->entityFactory->fromEmail()->findOneByAddress($address)) {
                throw new Exception_Internal('Email already exists');
            }

            $entity = (new FromEmail())->setAddress($address);
            $this->entityManager->persist($entity);
            $this->entityManager->flush();

            return
                new Http_JsonResponse(
                    [
                        'error' => false,
                        'message' => 'Mail from added.',
                    ]
                );
        }

        throw new Exception_Security();
    }

    /**
     * @param Http_Request $request
     * @return Http_Response
     */
    public function getContact(Http_Request $request)
    {
        if(Enum_Site::borderfield() != $request->getSiteType())
            $localisation = Localization_Resolver::create()->resolve($this->getValueOrElse($request->getPost(), 'lang', ''));

        return
            new Http_JsonResponse(
                [
                    'error' => false,
                    'data' =>
                        Enum_Site::borderfield() == $request->getSiteType()
                            ? [
                                'info_com' => 'info@bordermodels.com',
                                'info_be' => 'booking@bordermodels.com',
                                'info_nl' => 'holland@bordermodels.com',
                            ]
                            : [
                                'info_com' => $localisation['header']['contact_mail'],
                                'info_be' => 'info@castingteam.be',
                                'info_nl' => 'info@castingteam.nl',
                            ]
                ]
            );
    }

    /**
     * @param Entity_Person $user
     * @param Entity_Email $email
     * @param string $from
     * @param Http_Request $request
     */
    private function sendToUser(Entity_Person $user, Entity_Email $email, Http_Request $request, $from = Enum_Mail::COMMON_REPLY)
    {
        $additionalFields['custom_text'] = preg_replace('/\n/ui', '<br>', $this->getValueOrElse($request->getPost(), 'text', ''));

        if ($email->getId() == Enum_Mail::SPECIAL_EMAIL_ID) {
            $reply = Enum_Mail::CUSTOM_REPLY;
        } else {
            $reply = $from;
        }

        (new Mailer_LoggerProxy(new Mailer_Sender($reply)))->send($user, $email, $additionalFields);
    }
}
