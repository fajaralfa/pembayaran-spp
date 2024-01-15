<?php

require_once '../helper/db.php';

$nisn = $_GET['nisn'];
$sql = "DELETE FROM siswa WHERE nisn = $nisn";
mysqli_query($db, $sql);

header('location: ./');
