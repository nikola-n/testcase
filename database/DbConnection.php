<?php

namespace Database;

use PDO;

class DbConnection
{

    private $connection;

    public function __construct()
    {
        try {
            $host             = 'localhost';
            $dbName           = 'steets-testcase';
            $password         = 'root';
            $options          = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->connection = new PDO("mysql:$host,dbname=$dbName; $password, $options");
        } catch (\PDOException $e) {
            $e->getMessage();
            die();
        }
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
}