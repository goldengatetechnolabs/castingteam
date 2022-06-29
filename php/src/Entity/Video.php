<?php

class Entity_Video extends Core_Entity
{
    /**
     * @var Entity_Model
     */
    private $model;

    /**
     * @var string
     */
    private $code;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $active;

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $originalLink;

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    /**
     * @return Entity_Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Entity_Model $model
     * @return Entity_Video
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Entity_Video
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     * @return Entity_Video
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param int $active
     * @return Entity_Video
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     * @return Entity_Video
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return Entity_Video
     */
    public function setHost($host)
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLink()
    {
        return $this->originalLink;
    }

    /**
     * @param string $originalLink
     * @return Entity_Video
     */
    public function setOriginalLink($originalLink)
    {
        $this->originalLink = $originalLink;
        return $this;
    }
}