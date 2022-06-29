<?php

class Repository_AccessLog extends Core_Repository
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
     * @param Enum_UserType $type
     * @return Entity_AccessLog[]
     */
    public function findByUserType(Enum_UserType $type)
    {
        $result = [];

        foreach ($this->queryAssoc(sprintf('SELECT id FROM _log WHERE user_type_id=\'%s\' ORDER BY timestamp DESC', $this->escapeChars($type->getValue()))) as $log) {
            $result[] = new Entity_AccessLog($this->getValueOrThrowException($log, 'id'));
        }

        return $result;
    }
}