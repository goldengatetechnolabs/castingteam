<?php

class Controller_Casting extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', 'Casting');
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display('templates/site/casting.tpl');
    }
}