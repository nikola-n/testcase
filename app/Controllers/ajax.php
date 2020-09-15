<?php

require_once __DIR__ . '/../../database/DbConnection.php';

class YearController extends \Database\DbConnection
{
    public function getAllYears()
    {
        $sql  = "SELECT * FROM testcase";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode(["success" => 1, "data" => $data]);
    }
}

?>