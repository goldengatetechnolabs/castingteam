<?php

abstract class Core_DBManager
{
    /**
     * @var mysqli
     */
    protected $db;

    /**
     * @return mysqli
     */
    protected function getDB()
    {
        if (!$this->db) {
            $this->db = Flight::db();
        }

        return $this->db;
    }

    /**
     * @param string $text
     * @return string
     */
    protected function escapeChars($text) {
        return mysqli_real_escape_string($this->getDB() ,$text);
    }

    /**
     * @param $statement
     * @return mysqli_result
     * @throws Exception_DB
     */
    protected function query($statement)
    {
        $result = $this->getDB()->query($statement);

        if (! $result) {
            throw new Exception_DB($this->getDB()->error);
        }

        return $result;
    }

    /**
     * @param $statement
     * @return mixed
     * @throws Exception_DB
     */
    protected function querySingleRow($statement)
    {
        return $this->query($statement)->fetch_assoc();
    }

    /**
     * @param string $statement
     * @return mixed[]
     */
    protected function queryAssoc($statement)
    {
        $rows = $this->query($statement);

        while ($row = $rows->fetch_assoc()) {
            $results[] = $row;
        }

        return empty($results) ? [] : $results;
    }

    /**
     * @param array $container
     * @param string $key
     * @param mixed $else
     * @return mixed
     */
    protected function getValueOrElse(array $container, $key, $else)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        return $else;
    }

    /**
     * @param array $container
     * @param $key
     * @return mixed
     * @throws Exception_MissedParameter
     */
    protected function getValueOrThrowException(array $container, $key)
    {
        if (array_key_exists($key, $container)) {
            return $container[$key];
        }

        throw new Exception_MissedParameter(sprintf('Required parameter \'%s\' is missing', $key));
    }
}