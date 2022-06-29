<?php

class Controller_Homepage extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $video = getRandomHomePageVideo();
        $models = $this->getController()->getHomepageModels();

        $this->getSmarty()->assign('pageTitle', 'Homepage');
        $this->getSmarty()->assign('video', $video);
        $this->getSmarty()->assign('last_models', $models);
        $this->getSmarty()->assign('current_page', 'homepage');
        $this->getSmarty()->display('templates/site/homepage.tpl');
    }
}