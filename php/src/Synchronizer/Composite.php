<?php

class Synchronizer_Composite
{
    /**
     * @var PDO[]
     */
    private $pool;

    public function __construct()
    {
        $this->pool = $this->initializeConnections();
    }

    /**
     * @param $query
     * @return void
     */
    public function synchronize($query)
    {
        array_map(
            function(PDO $database) use ($query) {
                $database->query($query);
            },
            $this->pool
        );
    }

    /**
     * @return PDO[]
     */
    private function initializeConnections()
    {
        return
            array_map(function($credentials) {
                return
                    new PDO(
                        $credentials['dns'],
                        $credentials['user'],
                        $credentials['password']
                    );
            }, SYNCHRONIZE_POOL);
    }
}