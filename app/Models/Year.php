<?php

namespace App\Models;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../database/DbConnection.php';

use Database\DbConnection as DB;
use PDO;
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
    public function selectData()
    {
        try {
            if ($_SERVER['REQUEST_METHOD' == 'GET']) {
                $sql  = "SELECT * FROM testcase";
                $stmt = $this->getConnection()->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data[0] as $dataProperty => $dataValue) {
                    $this->setProperty($dataProperty, $dataValue);
                }
                return var_dump(json_decode(["success" => 1, "data" => $data]));

                //return $this;
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