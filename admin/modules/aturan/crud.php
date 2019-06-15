<?php

header('Content-Type: application/json');
include '../../include/dbconfig.php';

extract($_POST);
$output = array();

switch ($action) {
    case "add":
        $conn->query("DELETE FROM tbl_kaidah WHERE kd_virus='$kd_virus' AND kd_gejala='$kd_gejala'");
        $execute = $conn->query("INSERT INTO tbl_kaidah VALUES ('$kd_virus', '$kd_gejala')");

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }
        
        break;

    case "delete":
        $sql = "DELETE FROM tbl_kaidah WHERE kd_virus='$kd_virus' AND kd_gejala='$kd_gejala'";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }

        break;
}

echo json_encode($output);
