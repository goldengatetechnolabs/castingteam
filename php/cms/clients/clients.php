<?php

class Clients extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'clients');
    }
    public function create_client()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_client');
        $this->smarty->assign('include', 'cms/clients/create-client.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function client_list()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'client_list');
        $this->smarty->assign('include', 'cms/clients/client-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function create_inquiry()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_inquiry');
        $this->smarty->assign('include', 'cms/clients/create-inquiry.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function inquiry_list()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('hoofdmenu_actief', 'inquiry_list');
        $this->smarty->assign('tab_active', 'inquiry_list');
        $this->smarty->assign('include', 'cms/clients/inquiry-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function inquiry_detail()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'inquiry_list');
        $this->smarty->assign('include', 'cms/clients/inquiry-detail.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function archive()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'archive');
        $this->smarty->assign('include', 'cms/clients/archive.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
}

