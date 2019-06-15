<?php

header('Content-Type: application/json');
include '../../include/dbconfig.php';

extract($_POST);
$output = array();

switch ($action) {
    case "add":
        $sql = "INSERT INTO tbl_gejala VALUES ('$kd_gejala', '$nama_gejala', '$pertanyaan')";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }
        
        break;

    case "edit":
        $sql = "UPDATE tbl_gejala SET nama_gejala='$nama_gejala', pertanyaan='$pertanyaan' WHERE kd_gejala='$kd_gejala'";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }

        break;

    case "delete":
        $sql = "DELETE FROM tbl_gejala WHERE kd_gejala='$kd_gejala'";
        $execute = $conn->query($sql);

        if ($execute) {
            $output = array('success' => true);
        } else {
            $output = array('success' => false);
        }

        break;
}

echo json_encode($output);
