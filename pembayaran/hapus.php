<?php

require_once '../helper/db.php';

$id_pembayaran = $_GET['id_pembayaran'];
$sql = "DELETE FROM pembayaran WHERE id_pembayaran = $id_pembayaran";
mysqli_query($db, $sql);

header('location: riwayat.php');
