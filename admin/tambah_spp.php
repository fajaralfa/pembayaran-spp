<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $sql = "INSERT INTO spp (tahun, nominal) VALUES ($tahun, $nominal)";
    mysqli_query($db, $sql);
    header('location: spp.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data SPP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pembayaran SPP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="siswa.php">Data Siswa</a>
                    <a class="nav-link" href="kelas.php">Data Kelas</a>
                    <a class="nav-link" href="petugas.php">Data Petugas</a>
                    <a class="nav-link" href="spp.php">Data SPP</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="card" style="width: 35%;">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun SPP</label>
                    <input type="number" name="tahun" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" name="nominal" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Data SPP</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>