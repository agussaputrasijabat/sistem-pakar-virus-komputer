<?php
session_start();
include 'inc/dbconfig.php';
$is_logged_in = isset($_SESSION['kd_sesi']);
$session_kd_sesi = '';
$session_name = '';
$session_tanggal = '';

if ($is_logged_in) { 
    $session_kd_sesi = $_SESSION['kd_sesi'];
    $session_name = $_SESSION['name'];
    $session_tanggal = $_SESSION['tanggal_sesi'];
}

$module = isset($_GET['module']) ? $_GET['module'] : 'home';
$content = isset($_GET['p']) ? $_GET['p'] : 'index';
$content_file = "modules/" . $module . "/" . $content . ".php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Pakar Virus Komputer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Clean responsive bootstrap website template">
    <meta name="author" content="">

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    <?php include "inc/scripts.php"; ?>
</head>

<body>
    <?php include "inc/navbar.php"; ?>

    <?php include $content_file; ?>

    <?php include "inc/footer.php"; ?>
</body>

</html>