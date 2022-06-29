<?php

class Account_Admin extends Core_Account
{
    /**
     * @param Core_SessionHandler $sessionHandler
     */
    public function __construct(Core_SessionHandler $sessionHandler)
    {
        parent::__construct($sessionHandler);

        if ($this->isLogged()) {
            $this->user = new Entity_Admin($this->sessionHandler->get(SESSION_NAME_CMS_LOGIN));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function login($id)
    {
        $this->sessionHandler->set(SESSION_NAME_CMS_LOGIN, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->user;
    }

    /**
     * {@inheritdoc}
     */
    public function logout()
    {
        $this->sessionHandler->remove(SESSION_NAME_CMS_LOGIN);
    }

    /**
     * {@inheritdoc}
     */
    public function isLogged()
    {
        return !empty($this->sessionHandler->get(SESSION_NAME_CMS_LOGIN)) ? true : false;
    }
}