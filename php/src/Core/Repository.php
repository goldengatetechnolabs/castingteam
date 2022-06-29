<?php

abstract class Core_Repository extends Core_DBManager
{
    /**
     * @return Core_Entity[]
     */
    abstract public function findAll();

    /**
     * @param string $code
     * @return Core_Entity
     */
    abstract public function findByCode($code);
}