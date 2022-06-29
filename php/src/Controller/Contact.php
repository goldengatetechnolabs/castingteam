<?php

class Controller_Contact extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', 'Contact');
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display('templates/site/contact.tpl');
    }
}