<?php

class Repository_Email extends Core_Repository
{
    /**
     * @return Entity_Email[]
     */
    public function findAll()
    {
        foreach ($this->queryAssoc('SELECT * FROM `emails` ORDER BY `titel`') as $mail) {
            $result[] = new Entity_Email($this->getValueOrThrowException($mail, 'id'));
        }

        return empty($result) ? [] : $result;
    }

    /**
     * @param string $code
     * @return Entity_Email
     */
    public function findByCode($code)
    {
        $mail = $this->querySingleRow(sprintf('SELECT * FROM `emails` WHERE nice_name=\'%s\'', $code));

        return new Entity_Email($this->getValueOrThrowException($mail, 'id'));
    }
}