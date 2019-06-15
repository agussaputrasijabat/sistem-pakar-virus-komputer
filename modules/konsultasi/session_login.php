<?php
session_start();
header('Content-Type: application/json');

include '../../inc/dbconfig.php';
extract($_POST);

$output = array();
$curr_date = date('Y-m-d H:i:s');
$execute = $conn->query("INSERT INTO tbl_sesi (nama, tanggal) VALUES ('$name','$curr_date')");

if ($execute) {
    $_SESSION['kd_sesi'] = $conn->insert_id;
    $_SESSION['name'] = $name;
    $_SESSION['tanggal_sesi'] = $curr_date;

    $output = array('success' => true);
} else {
    $output = array('success' => false);
}

echo json_encode($output);
