<?php

class Background
{
    public function initCms()
    {
        if (
            isset($_SESSION[SESSION_NAME_CMS_LOGIN]) &&
            is_numeric($_SESSION[SESSION_NAME_CMS_LOGIN])
        ) {
            $id = $_SESSION[SESSION_NAME_CMS_LOGIN];  
            $user = Flight::db()->query("SELECT * FROM users WHERE id=" . $id)->fetch_array();
            Flight::smarty()->assign('user', $user);
        } else {
            exit();
        }     
    }

    public function initSiteLogging()
    {
        if (
            isset($_SESSION[SESSION_NAME_SITE_LOGIN]) &&
            is_numeric($_SESSION[SESSION_NAME_SITE_LOGIN])
        ) {
            $id = $_SESSION[SESSION_NAME_SITE_LOGIN];
            $controller = DBController::getInstance();
            $user = $controller->getUserById($id);

            if ($user) {
                Flight::smarty()->assign('user', $user);
            }
        } else {
            exit();
        }     
    }

    /**
     * @param bool $exit
     * @return bool
     */
    public function checkIsLogged($exit = false)
    {
        if(isset($_SESSION[SESSION_NAME_SITE_LOGIN]) && is_numeric($_SESSION[SESSION_NAME_SITE_LOGIN])) {
            return true;
        } else {
            if($exit == true) {
                exit();
            } else {
                return false;
            }
        }        
    }

    /**
     * @param $id
     */
    public function siteLogin($id)
    {
        $_SESSION[SESSION_NAME_SITE_LOGIN] = $id;    
    }  

    /***
     * @param boolean $exit
     * @return boolean
     */         
    public function checkLoggedInCms($exit = false)
    {
        if (
            isset($_SESSION[SESSION_NAME_CMS_LOGIN]) &&
            is_numeric($_SESSION[SESSION_NAME_CMS_LOGIN])
        ) {
            return true;
        } else if ($exit == true) {
            exit();
        } else {
            return false;
        }
    }

    public function siteLogout()
    {
        unset($_SESSION[SESSION_NAME_SITE_LOGIN]);
    }
    
    /**
     * Logt CMS user in
     * 
     * @return  boolean          
     */
    public function cmsLogin($id) {
        $_SESSION[SESSION_NAME_CMS_LOGIN] = $id;    
    }
}
