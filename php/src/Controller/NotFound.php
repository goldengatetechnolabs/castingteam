<?php

class Controller_NotFound extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        header("HTTP/1.1 404 Not Found");
        
        $this->getSmarty()->display('templates/site/not_found.tpl');
    }
}
