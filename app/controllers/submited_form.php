<?php

namespace App\controllers;

require_once __DIR__ . '/../models/Year.php';

use App\models\Year as Year;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<p class=text-danger>You don\'t have permission to access this file</p>';
    die();
} else {
    $year       = new Year;
    $year->year = $year->getPrimeYears();
    $year->day = $year->getDays();
    $year->save();

    //header('Location:../views/allYears.php');
}