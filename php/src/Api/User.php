<?php

class Api_User extends Core_Controller
{
    /**
     * @param Http_Request $request
     * @return Http_Response
     */
    public function add(Http_Request $request)
    {
        $user = new Entity_User();

        $user
            ->setSector($this->getValueOrThrowException($request->getPost(), 'sector'))
            ->setCompany($this->getValueOrThrowException($request->getPost(), 'company'))
            ->setRemark($this->getValueOrElse($request->getPost(), 'remark', ''))
            ->setName($this->getValueOrThrowException($request->getPost(), 'name'))
            ->setEmail($this->getValueOrThrowException($request->getPost(), 'email'))
            ->setPhone($this->getValueOrThrowException($request->getPost(), 'phone'))
            ->setSurname($this->getValueOrElse($request->getPost(), 'surname', ''))
            ->setCity($this->getValueOrElse($request->getPost(), 'city', ''))
            ->setCountry($this->getValueOrElse($request->getPost(), 'country', ''))
            ->setPostal($this->getValueOrElse($request->getPost(), 'postal', ''))
            ->setStreet($this->getValueOrElse($request->getPost(), 'address', ''));

        $temporaryPassword = rand(1000, 9999);

        if ($this->isAdmin()) {
            $user
                ->setPassword(md5($temporaryPassword))
                ->setAccepted(1);
        } else {
            $user
                ->setPassword(md5($this->getValueOrThrowException($request->getPost(), 'password')))
                ->setAccepted(0);
        }

        $user->create();

        if (!$this->isAdmin()) {
            $email = (new Repository_Email())->findByCode(Enum_EmailCode::TEMP_PASSWORD);
            (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))
                ->send(
                    $user,
                    $email,
                    ['temp_password' => $temporaryPassword])
            ;
        } else {
            $email = (new Repository_Email())->findByCode(Enum_EmailCode::VIP_REGISTRATION);
            (new Mailer_LoggerProxy(new Mailer_Sender(Enum_Mail::COMMON_REPLY)))->send($user, $email, []);
        }

        return new Http_Response(
            [
                'error' => false,
                'message' => 'Registration successful'
            ]
        );
    }
}