<?php

abstract class Core_Entity extends Core_DBManager
{
    /**
     * @var int
     */
    protected $id;

    abstract public function create();

    abstract public function update();

    abstract public function remove();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}