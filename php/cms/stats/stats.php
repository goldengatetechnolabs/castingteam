<?php

class Stats extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->smarty->assign('hoofdmenu_actief', 'stats');
    }

    /**
     * @return void
     */
    public function basic() 
    {
        $stats = $this->controller->getStats();

        $this->smarty->assign('keywords', $this->entityFactory->keyword()->getStatistics());
        $this->smarty->assign('stats', $stats);
        $this->smarty->assign('include_tabs', 'cms/stats/tabs.tpl');
        $this->smarty->assign('tab_active', 'basic');
        $this->smarty->assign('include', 'cms/stats/basic.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }

    /**
     * @return void
     */
    public function logs()
    {
        $logs = (new Repository_AccessLog())->findByUserType(Enum_UserType::create(Enum_UserType::BOOKER));
        $logs = array_map(
            function(Entity_AccessLog $log){
                return $log->toArray();
            },
            $logs
        );

        $this->smarty->assign('logs', $logs);
        $this->smarty->assign('include_tabs', 'cms/stats/tabs.tpl');
        $this->smarty->assign('tab_active', 'logs');
        $this->smarty->assign('include', 'cms/stats/logs.tpl');
        $this->smarty->display('templates/cms/index.tpl');
    }
}

