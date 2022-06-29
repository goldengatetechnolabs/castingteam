<?php

class Controller_Vip extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', 'Vip Registration');
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display('templates/site/vip.tpl');
    }
}
