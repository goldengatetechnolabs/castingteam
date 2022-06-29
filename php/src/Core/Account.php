<?php

abstract class Core_Account
{
    /**
     * @var Core_SessionHandler
     */
    protected $sessionHandler;

    /**
     * @var Entity_BasePerson
     */
    protected $user;

    /**
     * @param Core_SessionHandler $sessionHandler
     */
    public function __construct(Core_SessionHandler $sessionHandler)
    {
        $this->sessionHandler = $sessionHandler;
    }

    /**
     * @param int $id
     * @return void
     */
    abstract public function login($id);

    /**
     * @return Entity_BasePerson
     */
    abstract public function get();

    /**
     * @return void
     */
    abstract public function logout();

    /**
     * @return bool
     */
    abstract public function isLogged();

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->user->getType()->getValue() == Enum_UserType::ADMIN) ? true : false;
    }

    /**
     * @return bool
     */
    public function isBooker()
    {
        return ($this->user->getType()->getValue() == Enum_UserType::BOOKER) ? true : false;
    }

    /**
     * @return bool
     */
    public function isUpdater()
    {
        return ($this->user->getType()->getValue() == Enum_UserType::UPDATER) ? true : false;
    }
}
