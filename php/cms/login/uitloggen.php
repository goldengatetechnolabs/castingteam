<?php

class Uitloggen extends Core_Controller
{
    /**
     * @param Account_Admin $account
     */
    public function __construct(Account_Admin $account)
    {
        parent::__construct($account);

        $this->account->logout();
        header('Location: /cms');
    }        
}
