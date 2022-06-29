<?php

class Controller_Cms_Projects extends Core_Controller
{
    public function create_project()
    {
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'create_project');
        $this->smarty->assign('include', 'cms/projects/create-project.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function project_list()
    {
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'project_list');
        $this->smarty->assign('include', 'cms/projects/projects-list.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
    public function archive()
    {
        $this->smarty->assign('include_tabs', 'cms/projects/tabs.tpl');
        $this->smarty->assign('tab_active', 'archive');
        $this->smarty->assign('include', 'cms/projects/archive.tpl');
        $this->smarty->display('templates/cms/index-new.tpl');
    }
}
