<?php

require_once '../helper/db.php';

$id_kelas = $_GET['id_kelas'];
$sql = "DELETE FROM kelas WHERE id_kelas = $id_kelas";
mysqli_query($db, $sql);

header('location: index.php');
