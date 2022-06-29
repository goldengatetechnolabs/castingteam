<?php

class Controller_Cms_Emails extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
    }

    /**
     * @return void
     */
    public function overview(Http_Request $request)
    {
        foreach ((new Repository_Email())->findAll() as $mail) {
            $emails[] = $mail->toArray();
        }

        $this->smarty->assign('languages', ['nl', 'en', 'fr']);
        $this->smarty->assign('emails', isset($emails) ? $emails : []);
        $this->smarty->assign('include', 'cms/communicatie/lijst.html');
        $this->smarty->display('templates/cms/index.tpl');
    }
}
