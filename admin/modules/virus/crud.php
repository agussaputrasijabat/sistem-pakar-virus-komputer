<?php

header('Content-Type: application/json');
include '../../include/dbconfig.php';

extract($_POST);
$output = array();

switch ($action) {
    case "add":
        $sql = "INSERT INTO tbl_virus VALUES ('$kd_virus', '$nama_virus', '$keterangan', '$solusi')";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }
        
        break;

    case "edit":
        $sql = "UPDATE tbl_virus SET nama_virus='$nama_virus', keterangan='$keterangan', solusi='$solusi' WHERE kd_virus='$kd_virus'";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }

        break;

    case "delete":
        $sql = "DELETE FROM tbl_virus WHERE kd_virus='$kd_virus'";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }

        break;
}

echo json_encode($output);
