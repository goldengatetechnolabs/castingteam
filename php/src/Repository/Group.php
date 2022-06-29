<?php

class Repository_Group extends Core_Repository
{
    /**
     * @return Entity_Group[]
     */
    public function findAllBorderfield()
    {
        $results = $this->queryAssoc('SELECT `id` FROM `groepen` WHERE `naam` LIKE \'%border %\' OR `naam` LIKE \'%bordermodels%\'');

        $groups = [];

        foreach ($results as $result) {
            $groups[] = new Entity_Group($result['id']);
        }

        return $groups;
    }

    /**
     * @return Entity_Group[]
     */
    public function findAllBorderfieldSpecialties()
    {
        $results = $this->queryAssoc('SELECT `id` FROM `groepen` WHERE `naam` LIKE \'%specialties %\'');

        $groups = [];

        foreach ($results as $result) {
            $groups[] = new Entity_Group($result['id']);
        }

        return $groups;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    /**
     * {@inheritdoc}
     */
    public function findByCode($code)
    {
        // TODO: Implement findByCode() method.
    }

    /**
     * @param Entity_Group[] $groups
     * @return array
     */
    public function toArray(array $groups)
    {
        return
            array_map(
                function(Entity_Group $group) {
                    return [
                        'id' => $group->getId(),
                        'name' => $group->getName(),
                    ];
                },
                $groups
            );
    }
}