<?php
session_start();
if (!isset($_SESSION['spp_petugas'])) {
    header('location: login_petugas.php');
    exit;
}
?>
<?php require_once 'layout/header_root.php' ?>
<?php require_once 'layout/footer.php' ?>