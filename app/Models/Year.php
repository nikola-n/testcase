<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../database/DbConnection.php';


use Database\DbConnection as DB;
use PDOException;

class Year extends DB
{
    use DataOptimisation;

    public $year;
    public $day;

    /**
     * @param $property
     * @param $value
     */
    public function setProperty($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * @param $property
     *
     * @return mixed
     */
    public function getProperty($property)
    {
        return $this->$property;
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