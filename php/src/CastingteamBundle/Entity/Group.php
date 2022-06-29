<?php

namespace CastingteamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Entity(repositoryClass="CastingteamBundle\Entity\Repository\Group")
 * @ORM\Table(name="groepen")
 */
class Group
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
     * @ORM\Column(type="string", name="naam", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", name="short_name", length=255, nullable=true)
     */
    private $shortName;

    /**
     * @var Category[]
     *
     * @ORM\ManyToMany(targetEntity="Category", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="category_group",
     *     joinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="category_id")}
     * )
     */
    private $categories = [];

    /**
     * @var Model[]
     *
     * @ORM\ManyToMany(targetEntity="Model", orphanRemoval=true)
     * @ORM\JoinTable(
     *     name="model_groepen",
     *     joinColumns={@ORM\JoinColumn(name="id_groep", referencedColumnName="id")},
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
     * @return Group
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
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return Group
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
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
     * @return Group
     */
    public function setModels($models)
    {
        $this->models = $models;
        return $this;
    }
}