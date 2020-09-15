<?php

namespace App\Controllers;

require_once __DIR__ . '/../Models/Year.php';
require_once __DIR__ . '/../../database/DbConnection.php';

use App\Models\Year;

/**
 * @param \App\Models\Year $year
 */
function yearValidation(Year $year)
{
    foreach ($year->selectData() as $years) {
        if ($years['year'] === json_encode($year->year)) {
            echo '<h1 style="color: red;">This record already exists.</h1>
            <a href="/views/index.html" style="border: 2px solid darkcyan; text-decoration: none; color: white; padding: 10px 10px; background: black;">Go Back!</a>
            <a href="/views/allYears.php?method=list" style="border: 2px solid darkcyan; text-decoration: none; color: white; padding: 10px 10px; background: black;">View all years!</a>';
            die();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo '<h1 style="color: red;">You don\'t have permission to access this file.</h1>';
    die();
} else {
    $year       = new Year();
    $year->year = $year->getPrimeYears();
    $year->day  = $year->getDays();
    yearValidation($year);
    $year->save();
    
    header("Location: /views/allYears.php?method=list");
}