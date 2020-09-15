<?php

namespace Database;

require __DIR__ . '/../vendor/autoload.php';

use PDO;

try {
    $db = new PDO('mysql:host=localhost;dbname=steets-testcase', 'root', 'root');
} catch (\PDOException $th) {
    echo $th->getMessage();
}

class DbConnection
{

    /**
     * @var \PDO
     */
    private $connection;

    public function __construct()
    {
        try {
            $host             = 'localhost';
            $dbName           = 'steets-testcase';
            $username         = 'root';
            $password         = 'root';
            $options          = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->connection = new PDO("mysql:host=$host;dbname=$dbName", $username, $password, $options);
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