<?php

require_once '../helper/db.php';

$id_petugas = $_GET['id_petugas'];
$sql = "DELETE FROM petugas WHERE id_petugas = $id_petugas";
mysqli_query($db, $sql);

header('location: ./');
