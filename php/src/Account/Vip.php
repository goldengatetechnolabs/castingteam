<?php

class Account_Vip extends Core_Account
{
    /**
     * {@inheritdoc}
     */
    public function login($id)
    {
        $this->sessionHandler->set(SESSION_NAME_SITE_LOGIN, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function logout()
    {
        $this->sessionHandler->remove(SESSION_NAME_SITE_LOGIN);
    }

    /**
     * {@inheritdoc}
     */
    public function isLogged()
    {
        return $this->sessionHandler->get(SESSION_NAME_SITE_LOGIN);
    }

    /**
     * @return Entity_BasePerson
     */
    public function get()
    {
        return $this->user;
    }
}