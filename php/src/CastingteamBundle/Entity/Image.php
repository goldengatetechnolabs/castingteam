<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Group
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Image")
 * @ORM\Table(name="model_images")
 */
class Image
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
     * @ORM\JoinColumn(name="id_model", referencedColumnName="model_id", nullable=true)
     */
    private $model;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", name="timestamp", nullable=true)
     */
    private $timestamp;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Image
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
     * @return Image
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param DateTime $timestamp
     * @return Image
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }
}