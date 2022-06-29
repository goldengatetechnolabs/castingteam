<?php

class Controller_Conditions extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', 'Conditions');
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display('templates/site/conditions.tpl');
    }
}