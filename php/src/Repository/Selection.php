<?php

class Repository_Selection extends Core_Repository
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
     * @param string $code
     * @return Core_Entity
     */
    public function findOneByCode($code)
    {
        $selection = $this->querySingleRow(sprintf('SELECT * FROM `selecties` WHERE `code`=\'%s\'', $this->escapeChars($code)));

        return new Entity_Selection($selection['id']);
    }

    /**
     * @param Entity_User $user
     * @return Entity_Selection[]
     */
    public function findAllByUser(Entity_User $user)
    {
        foreach ($this->queryAssoc(
            sprintf('
                SELECT * FROM `selecties` 
                JOIN LEFT `selecties_models` ON `selecties`.id = `selecties_models`.id_selectie 
                WHERE selecties_models.model_id=\'%s\')', $user->getId())) as $selection
        ) {
            $result[] = new Entity_Selection($this->getValueOrThrowException($selection, 'id'));
        }

        return empty($result) ? [] : $result;
    }
}