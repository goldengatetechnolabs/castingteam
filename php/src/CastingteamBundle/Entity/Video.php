<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Video")
 * @ORM\Table(name="model_videos")
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Model
     *
     * @ORM\ManyToOne(targetEntity="Model")
     * @ORM\JoinColumn(name="model_id", referencedColumnName="model_id", nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="code", length=120, nullable=false)
     */
    private $code;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", name="timestamp", nullable=true)
     */
    private $timestamp;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="active", length=11, nullable=true)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="source", length=256, nullable=true)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="host", length=256, nullable=true)
     */
    private $host;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="original_link", length=256, nullable=true)
     */
    private $originalLink;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Video
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param Model $model
     * @return Video
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
     * @return Video
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     * @return Video
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
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
     * @return Video
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
     * @return Video
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
     * @return Video
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
     * @return Video
     */
    public function setOriginalLink($originalLink)
    {
        $this->originalLink = $originalLink;
        return $this;
    }
}