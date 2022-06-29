<?php

class Repository_Category extends Core_Repository
{
    /**
     * @return Core_Entity[]
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param string $code
     * @return Core_Entity
     */
    public function findByCode($code)
    {
        // TODO: Implement findByCode() method.
    }

    /**
     * @param Entity_Model $model
     * @param string $subtype
     * @return Entity_Category[]
     */
    public function findByModelAndSubtype(Entity_Model $model, $subtype)
    {
        foreach ($this->queryAssoc(sprintf('SELECT * FROM `category` WHERE subtype=\'%s\' AND category_id IN (SELECT category_id FROM modelcategory WHERE model_id=\'%s\')', $subtype, $model->getId())) as $category) {
            $result[] = new Entity_Category($this->getValueOrThrowException($category, 'category_id'));
        }

        return empty($result) ? [] : $result;
    }
}