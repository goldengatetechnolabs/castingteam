<?php

class Emails extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
    }

    /**
     * @return void
     */
    public function lijst()
    {
        foreach ((new Repository_Email())->findAll() as $mail) {
            $emails[] = $mail->toArray();
        }

        $keywords = $this->entityFactory->template()->findAllAsArray();

        $this->smarty->assign('languages', ['nl', 'en', 'fr']);
        $this->smarty->assign('emails', isset($emails) ? $emails : []);
        $this->smarty->assign('keywords', $keywords);
        $this->smarty->assign('include', 'cms/communicatie/lijst.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }
}
