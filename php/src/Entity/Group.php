<?php

class Entity_Group extends Core_Entity
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Entity_Category
     */
    private $category;

    /**
     * @var Entity_Model[]
     */
    private $models;

    /**
     * @param null|int $id
     */
    public function __construct($id = null)
    {
        if (!is_null($id)) {
            $entity = $this->querySingleRow(
                sprintf(
                    'SELECT * FROM `groepen` WHERE id=\'%s\'',
                    filter_var($id, FILTER_VALIDATE_INT)
                )
            );

            $this->setId($this->getValueOrElse($entity, 'id', 0));
            $this->setName($this->getValueOrElse($entity, 'naam', ''));
            $this->setCategory($this->createCategory());
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
        $this->query(sprintf('UPDATE `groepen` SET naam=\'%s\' WHERE id=\'%s\'', $this->getName(), $this->getId()));
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
     * @return Entity_Group
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Entity_Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Entity_Category $category
     * @return Entity_Group
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Entity_Category
     */
    private function createCategory()
    {
        $response = $this->querySingleRow(
            sprintf(
                'SELECT category_id FROM `category_group` WHERE `group_id`=\'%s\'',
                $this->getId()
            )
        );

        return
            is_null($response)
                ? new Entity_Category()
                : new Entity_Category($this->getValueOrElse($response, 'category_id', []));
    }
}
