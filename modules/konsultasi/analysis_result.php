<?php
session_start();
header('Content-Type: application/json');
include '../../inc/dbconfig.php';

extract($_POST);

$output = array();
$curr_date = date('Y-m-d H:i:s');
$execute = $conn->query("INSERT INTO tbl_analisa_hasil (kd_virus,nama,kd_sesi,tanggal) VALUES ('$kd_virus','$name','$kd_sesi','$curr_date')");

if ($execute) {
    $output = array('success' => true);
} else {
    $output = array('success' => false);
}

echo json_encode($output);
