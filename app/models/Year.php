<?php

namespace App\models;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../database/DbConnection.php';
use Carbon\Carbon;
use Database\DbConnection;
use PDOException;

class Year extends DbConnection
{

    /**
     * @return array
     */
    public function getPrimeYears()
    {
        $year         = $_POST['year'];
        $primeNumbers = [];
        while ($year) {
            if ($this->isPrime($year)) {
                $primeNumbers[] = $year;
            }
            if (count($primeNumbers) == 30) {
                break;
            }
            $year--;
        }

        return $primeNumbers;
    }

    /**
     * @return array
     */
    public function getChristmasDate()
    {
        foreach ($this->getPrimeYears() as $carbonDate) {
            $date[] = Carbon::create($carbonDate, 12, 25)->format('Y-m-d');
        }
        return $date;
    }

    /**
     * @return array
     *
     */
    public function getDays()
    {
        foreach ($this->getChristmasDate() as $year => $day) {
            $timestamp = strtotime($day);
            $days[]        = date('D', $timestamp);
        }
        return $days;
    }

    /**
     * @param $number
     *
     * @return int
     */
    public function isPrime($number)
    {
        if ($number == 1) {
            return 0;
        }
        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0) {
                return 0;
            }
        }
        return $number;
    }

    /**
     * @return mixed
     */
    public function save()
    {
        try
        {
            $sql = "INSERT INTO testcase (year, day) VALUES (:year, :day)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->bindParam(":year", $this->year);
            $stmt->bindParam(":day", $this->day);
            $stmt->execute();
            $this->id = $this->getConnection()->lastInsertId();

            return $this->id;

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}