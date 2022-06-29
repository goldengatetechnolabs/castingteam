<?php

class Controller_Cms_Clients extends Core_Controller
{
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
    public function archive()
    {
        $this->smarty->assign('include_tabs', 'cms/clients/tabs.tpl');
        $this->smarty->assign('tab_active', 'archive');
        $this->smarty->assign('include', 'cms/clients/archive.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
}
