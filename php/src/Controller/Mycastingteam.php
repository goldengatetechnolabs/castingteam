<?php

class Controller_Mycastingteam extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        if ($this->isLogged()) {
            $selections = $this->getController()->getUserSelections($_SESSION[SESSION_NAME_SITE_LOGIN]);

            if ($selections) {
                $this->getSmarty()->assign('selections', $selections);
            }
        }

        $this->getSmarty()->assign('pageTitle', 'My Castingteam');
        $this->getSmarty()->assign('current_page', 'otherpage');
        $this->getSmarty()->display('templates/site/profile.tpl');
    }
}
