<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Selection
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Selection")
 * @ORM\Table(name="selecties")
 */
class Selection
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
     * @var string
     *
     * @ORM\Column(type="string", name="name", length=200, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", name="creation_date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="selection_type", length=255, nullable=false)
     */
    private $selectionType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="code", length=255, nullable=false)
     */
    private $code;

    /**
     * @var Model[]
     *
     * @ORM\ManyToMany(targetEntity="Model", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="selecties_models",
     *     joinColumns={@ORM\JoinColumn(name="id_selectie", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_model", referencedColumnName="model_id")}
     * )
     */
    private $models = [];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Selection
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Selection
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Selection
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getSelectionType()
    {
        return $this->selectionType;
    }

    /**
     * @param string $selectionType
     * @return Selection
     */
    public function setSelectionType($selectionType)
    {
        $this->selectionType = $selectionType;
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
     * @return Selection
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return Model[]
     */
    public function getModels()
    {
        return $this->models;
    }

    /**
     * @param Model[] $models
     * @return Selection
     */
    public function setModels($models)
    {
        $this->models = $models;
        return $this;
    }

    /**
     * @param Model $model
     * @return $this
     */
    public function addModel(Model $model)
    {
        $this->models[] = $model;
        return $this;
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function isContain(Model $model)
    {
        $flag = false;

        foreach ($this->models as $internalModel) {
            if ($internalModel->getId() == $model->getId()) {
                $flag = true;
            }
        }

        return $flag;
    }
}