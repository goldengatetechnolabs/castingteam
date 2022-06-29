<?php

class Repository_Admin extends Core_Repository
{
    /**
     * @return Core_Entity[]
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param string $code
     * @return Core_Entity
     */
    public function findByCode($code)
    {
        // TODO: Implement findByCode() method.
    }

    /**
     * @param string $username
     * @param string $password
     * @return Core_Entity
     */
    public function findOneByUsernameAndPassword($username, $password)
    {
        return
            new Entity_Admin(
                $this->querySingleRow(
                    sprintf(
                        'SELECT id FROM users WHERE email=\'%s\' AND wachtwoord=\'%s\'',
                        $this->escapeChars($username),
                        md5($this->escapeChars($password))
                    )
                )['id']
            );
    }
}