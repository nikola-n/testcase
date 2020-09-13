<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/Year.php';
require_once __DIR__ . '/../../database/DbConnection.php';

use App\Models\Year;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<h1 style="color: red;">You don\'t have permission to access this file.</h1>';
    die();
} else {
    $year       = new Year();
    $year->year = $year->getPrimeYears();
    $year->day = $year->getDays();
    $year->save();
    
    header('Location: /views/allYears.php');
}