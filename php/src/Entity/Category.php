<?php

class Entity_Category extends Core_Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var string
     */
    private $visible;

    /**
     * @var string
     */
    private $codename;

    /**
     * @var Entity_Group[]
     */
    private $groups;

    /**
     * @var Entity_Model[]
     */
    private $models;

    /**
     * @param null|int $id
     * @throws Entity_Exception_CategoryNotFound
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $category = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `category` WHERE `category_id`=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            if (!is_array($category)) {
                throw new Entity_Exception_CategoryNotFound();
            }

            $this->id = $this->getValueOrElse($category, 'category_id', 0);
            $this->name = $this->getValueOrElse($category, 'name', '');
            $this->visible = $this->getValueOrElse($category, 'visible', '');
            $this->codename = $this->getValueOrElse($category, 'codename', '');
            $this->type = $this->getValueOrElse($category, 'type', '');
            $this->subtype = $this->getValueOrElse($category, 'subtype', '');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        // TODO: Implement update() method.
    }

    /**
     * {@inheritdoc}
     */
    public function remove()
    {
        // TODO: Implement remove() method.
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
     * @return Entity_Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Entity_Category
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param string $subtype
     * @return Entity_Category
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
        return $this;
    }

    /**
     * @return string
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param string $visible
     * @return Entity_Category
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodename()
    {
        return $this->codename;
    }

    /**
     * @param string $codename
     * @return Entity_Category
     */
    public function setCodename($codename)
    {
        $this->codename = $codename;
        return $this;
    }

    /**
     * @param Entity_Group $group
     * @return Entity_Category
     */
    public function addGroup(Entity_Group $group)
    {
        $this->groups[$group->getId()] = $group;
        return $this;
    }
}
