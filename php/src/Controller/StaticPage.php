<?php

class Controller_StaticPage extends Controller_BaseConfigurablePage
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', $this->parameters['title']);
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display($this->parameters['template']);
    }
}
