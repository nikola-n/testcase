<?php

namespace App\Models;

use Carbon\Carbon;

trait DataOptimisation
{

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
     *
     */
    public function getDays()
    {
        foreach ($this->getChristmasDate() as $year => $day) {
            $timestamp = strtotime($day);
            $days[]    = date('D', $timestamp);
        }
        return $days;
    }
}