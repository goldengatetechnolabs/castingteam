<?php

class Controller_Cms_Login extends Core_Controller
{
    private $account;

    public function __construct()
    {
        parent::__construct();

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
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

        $this->smarty->display('templates/cms/login.tpl');
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
