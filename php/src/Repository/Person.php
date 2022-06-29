<?php

abstract class Repository_Person extends Core_Repository
{
    /**
     * @param string $email
     * @return Entity_Person
     */
    abstract public function findByEmail($email);
}