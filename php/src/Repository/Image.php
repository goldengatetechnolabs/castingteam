<?php

class Repository_Image extends Core_Repository
{
    /**
     * @return Entity_Email[]
     */
    public function findAll()
    {
        foreach ($this->queryAssoc('SELECT * FROM `model_site_images`') as $image) {
            $result[] = new Entity_Image($this->getValueOrThrowException($image, 'id'));
        }

        return empty($result) ? [] : $result;
    }

    /**
     * @param string $code
     * @return Entity_Email
     */
    public function findByCode($code)
    {

    }

    /**
     * @param Entity_Model $model
     * @return Entity_Image|null
     */
    public function findWithMaxOrder(Entity_Model $model)
    {
        $query = strtr('SELECT * FROM `model_site_images` where id_model={modelId} and volgorde IN (SELECT max(`model_site_images`.volgorde) FROM `model_site_images` where id_model={modelId})', ['{modelId}' => $model->getId()]);

        foreach ($this->queryAssoc($query) as $image) {
            $result[] = new Entity_Image($this->getValueOrThrowException($image, 'id'));
        }

        return empty($result) ? null : $result[0];
    }
}