<?php

require_once '../helper/db.php';

$id_spp = $_GET['id_spp'];
$sql = "DELETE FROM spp WHERE id_spp = $id_spp";
mysqli_query($db, $sql);

header('location: spp.php');