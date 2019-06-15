<?php
session_start();
header('Content-Type: application/json');
include '../../inc/dbconfig.php';


$gejala = array();
foreach($conn->query("SELECT * FROM tbl_gejala") as $row) $gejala[] = $row;     

$virus = array();
foreach($conn->query("SELECT * FROM tbl_virus") as $row) $virus[] = $row;   

$kaidah = array();
foreach($conn->query("SELECT * FROM tbl_kaidah") as $row) $kaidah[] = $row;   

$output = array('gejala' => $gejala, 'virus' => $virus, 'kaidah' => $kaidah);
echo json_encode($output);