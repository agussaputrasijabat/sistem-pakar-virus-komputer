<?php
session_start();

$kd_user = isset($_SESSION['kd_user']) ? $_SESSION['kd_user'] : '';

if (empty($kd_user))
{
    header('location:login.php');
    exit;
}

$nama_pakar = $_SESSION['nama'];
$module = isset($_GET['module']) ? $_GET['module'] : 'home';
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$php_file = 'modules/' . $module . '/' . $page . '.php';

include 'include/dbconfig.php';
include 'include/head.php';
?>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper">
        <?php
        include "include/nav_header.php";
        include "include/left_sidebar.php";
        ?>
        <div class="page-wrapper">
            <?php
            if (file_exists($php_file)) {
                include $php_file;
            } else {
                include "modules/error/404.php";
            }
            ?>
            <footer class="footer text-center">
                Dibuat oleh Agus Saputra Sijabat & Ferdyawan. All Rights Reserved.
            </footer>
        </div>
    </div>
</body>

</html>