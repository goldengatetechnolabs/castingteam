<?php

class Controller_Logout extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        Flight::bg()->siteLogout();
        header("Location: " . preg_replace('/\?login.+/ui', '', $request->getServer()['HTTP_REFERER']));
        exit();
    }
}
