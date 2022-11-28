<?php

class Controller_Portfoliosessies extends Controller_Page
{
    /**
     * {@inheritdoc}
     */
    public function show(Http_Request $request)
    {
        $this->getSmarty()->assign('pageTitle', 'PortfolioSessies');
        $this->getSmarty()->assign('current_page', 'PortfolioSessies');
        $this->getSmarty()->display('templates/site/portfolio_sessies.tpl');
    }
}