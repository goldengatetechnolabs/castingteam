<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Group
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Keyword")
 * @ORM\Table(name="keywords")
 */
class Keyword
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
     * @ORM\JoinColumn(name="model_id", referencedColumnName="model_id", nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="word", length=255, nullable=false)
     */
    private $word;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Keyword
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
     * @return Keyword
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * @param string $word
     * @return Keyword
     */
    public function setWord($word)
    {
        $this->word = $word;
        return $this;
    }
}