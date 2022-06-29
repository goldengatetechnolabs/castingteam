<?php

class Repository_Model extends Repository_Person
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
     * @param string $email
     * @return Entity_Person
     */
    public function findByEmail($email)
    {
        // TODO: Implement findByEmail() method.
    }

    /**
     * @param Entity_Group $group
     * @return Entity_Person
     */
    public function findByGroup(Entity_Group $group)
    {

    }

    /**
     * @param Entity_Group[] $groups
     * @return Entity_Person[]
     */
    public function findAllByGroups(array $groups)
    {
        $groupIds = array_map(function (Entity_Group $group) { return $group->getId(); }, $groups);

        $results = $this->queryAssoc(sprintf('SELECT DISTINCT model.model_id FROM model LEFT JOIN model_groepen ON model_groepen.id_model = model.model_id WHERE model_groepen.id_groep IN (\'%s\') ORDER BY model.model_id DESC', implode('\',\'', $groupIds)));

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Selection[] $selections
     * @return Entity_Person[]
     */
    public function findAllBySelections(array $selections)
    {
        $ids = array_map(function (Entity_Selection $selection) { return $selection->getId(); }, $selections);

        $results = $this->queryAssoc(sprintf('
            SELECT DISTINCT model.model_id AS `id` 
            FROM model 
            LEFT JOIN selecties_models ON selecties_models.id_model = model.model_id 
            WHERE selecties_models.id_selectie IN (\'%s\') ORDER BY model.model_id DESC',
            implode('\',\'', $ids)
        ));

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Group[] $groups
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findByGroupsWithLimit(array $groups, $from, $to)
    {
        $groupIds = array_map(function (Entity_Group $group) { return $group->getId(); }, $groups);

        $results = $this->queryAssoc(
            sprintf(
                'SELECT DISTINCT model.model_id FROM model LEFT JOIN model_groepen ON model_groepen.id_model = model.model_id WHERE model_groepen.id_groep IN (\'%s\') ORDER BY model.model_id DESC LIMIT %s, %s',
                implode('\',\'', $groupIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Group[] $groups
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findActiveByGroupsWithLimit(array $groups, $from, $to)
    {
        $groupIds = array_map(function (Entity_Group $group) { return $group->getId(); }, $groups);

        $results = $this->queryAssoc(
            sprintf('
                SELECT DISTINCT model.model_id 
                FROM model 
                LEFT JOIN model_groepen ON model_groepen.id_model = model.model_id 
                WHERE model_groepen.id_groep IN (\'%s\')
                AND model.accepted = 1
                AND model.declined = 0
                AND model.nieuw_actief = 1
                ORDER BY model.model_id
                DESC LIMIT %s, %s',
                implode('\',\'', $groupIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Selection[] $selections
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findBySelectionsWithLimit(array $selections, $from, $to)
    {
        $selectionIds = array_map(function (Entity_Selection $selection) { return $selection->getId(); }, $selections);

        $results = $this->queryAssoc(
            sprintf('
                SELECT DISTINCT model.model_id 
                FROM model 
                LEFT JOIN selecties_models ON selecties_models.id_model = model.model_id
                WHERE selecties_models.id_selectie IN (\'%s\')
                LIMIT %s, %s',
                implode('\',\'', $selectionIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Selection[] $selections
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findActiveBySelectionsWithLimit(array $selections, $from, $to)
    {
        $selectionIds = array_map(function (Entity_Selection $selection) { return $selection->getId(); }, $selections);

        $results = $this->queryAssoc(
            sprintf('
                SELECT DISTINCT model.model_id 
                FROM model 
                LEFT JOIN selecties_models ON selecties_models.id_model = model.model_id
                WHERE selecties_models.id_selectie IN (\'%s\')
                AND model.accepted = 1
                AND model.declined = 0
                AND model.nieuw_actief = 1
                LIMIT %s, %s',
                implode('\',\'', $selectionIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Group[] $groups
     * @param Entity_Selection[] $selections
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findByGroupsAndSelectionsWithLimit(array $groups, array $selections, $from, $to)
    {
        $groupIds = array_map(function (Entity_Group $group) { return $group->getId(); }, $groups);
        $selectionIds = array_map(function (Entity_Selection $selection) { return $selection->getId(); }, $selections);

        $results = $this->queryAssoc(
            sprintf('
                SELECT DISTINCT model.model_id 
                FROM model 
                LEFT JOIN model_groepen ON model_groepen.id_model = model.model_id
                LEFT JOIN selecties_models ON selecties_models.id_model = model.model_id
                WHERE model_groepen.id_groep IN (\'%s\') 
                AND selecties_models.id_selectie IN (\'%s\')
                LIMIT %s, %s',
                implode('\',\'', $groupIds),
                implode('\',\'', $selectionIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }

    /**
     * @param Entity_Group[] $groups
     * @param Entity_Selection[] $selections
     * @param int $from
     * @param int $to
     * @return Entity_Person[]
     */
    public function findActiveByGroupsAndSelectionsWithLimit(array $groups, array $selections, $from, $to)
    {
        $groupIds = array_map(function (Entity_Group $group) { return $group->getId(); }, $groups);
        $selectionIds = array_map(function (Entity_Selection $selection) { return $selection->getId(); }, $selections);

        $results = $this->queryAssoc(
            sprintf('
                SELECT DISTINCT model.model_id 
                FROM model 
                LEFT JOIN model_groepen ON model_groepen.id_model = model.model_id
                LEFT JOIN selecties_models ON selecties_models.id_model = model.model_id
                WHERE model_groepen.id_groep IN (\'%s\') 
                AND selecties_models.id_selectie IN (\'%s\')
                AND model.accepted = 1
                AND model.declined = 0
                AND model.nieuw_actief = 1
                LIMIT %s, %s',
                implode('\',\'', $groupIds),
                implode('\',\'', $selectionIds),
                $from,
                $to
            )
        );

        return
            array_map(
                function($result) {
                    return new Entity_Model($result['model_id']);
                },
                $results
            );
    }
}