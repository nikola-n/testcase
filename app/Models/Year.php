<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../database/DbConnection.php';

use Database\DbConnection as DB;
use PDO;
use PDOException;
use function MongoDB\BSON\toJSON;

class Year extends DB
{
    use DataOptimisation;

    public $year;

    public $day;

    /**
     * @return mixed
     */
    public function selectData()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $sql  = "SELECT * FROM testcase";
                $stmt = $this->getConnection()->prepare($sql);
                $stmt->execute();
                return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $e->getMessage();
            die();
        }

    }

    /**
     * @return mixed
     */
    public function save()
    {
        try {
            $sql   = "INSERT INTO testcase (year, day) VALUES (:year, :day)";
            $stmt  = $this->getConnection()->prepare($sql);
            $years = json_encode($this->year);
            $days  = json_encode($this->day);
            $stmt->bindParam(":year", $years);
            $stmt->bindParam(":day", $days);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}