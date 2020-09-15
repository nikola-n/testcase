<?php

require __DIR__ . '/../../database/DbConnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if ($_GET['method'] == 'list') {
        $sql  = "SELECT * FROM testcase";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $html = '';
        foreach ($data as $key => $value) {
            $yearArray = json_decode($value['year']);
            $dayArray  = json_decode($value['day']);
            $dataArray = array_combine($yearArray, $dayArray);

            foreach ($dataArray as $year => $day) {
                $html .= '
        <tr>
            <td>' . $value['id'] . '</td>
            <td>' . $year . '</td>
            <td>' . $day . '</td>
        </tr>
        ';
            }
        }
    }
    echo json_encode(['html' => $html]);

}