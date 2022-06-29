<?php

class Controller_Cms_Stats extends Core_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->smarty->assign('hoofdmenu_actief', 'communicatie');
    }

    /**
     * @return void
     */
    public function basic()
    {
        $stats = $this->controller->getStats();
        $this->smarty->assign('stats', $stats);
        $this->smarty->assign('include_tabs', 'cms/stats/tabs.tpl');
        $this->smarty->assign('tab_active', 'basic');
        $this->smarty->assign('include', 'cms/stats/basic.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }
}
