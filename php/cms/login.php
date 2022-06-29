<?php

class Login extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->account = $account;
    }

    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if ($request->getServer()['REQUEST_METHOD'] == 'POST') {
            $user = $this->findUser($request);

            if (is_null($user->getId())) {
                $this->smarty->assign('error', 'Geen gebruiker gevonden met deze gegevens');
            } else {
                $this->account->login($user->getId());
                header('Location: /cms/');
            }
        }

        $this->smarty->display('templates/cms/login.html');
    }

    /**
     * @param Http_Request $request
     * @return Core_Entity
     */
    private function findUser(Http_Request $request)
    {
        return
            (new Repository_Admin())->findOneByUsernameAndPassword(
                $this->getValueOrThrowException($request->getPost(), 'email'),
                $this->getValueOrThrowException($request->getPost(), 'wachtwoord')
            );
    }
}
