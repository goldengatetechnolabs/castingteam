<?php

class Controller_ServerError extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        header($request->getServer()['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);

        $this->getSmarty()->display('templates/site/server_error.tpl');
    }
}
