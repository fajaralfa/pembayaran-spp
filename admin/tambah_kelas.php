<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $sql = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('$nama_kelas', '$kompetensi_keahlian')";
    mysqli_query($db, $sql);
    header('location: kelas.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Kelas</title>
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
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                    <input type="text" name="kompetensi_keahlian" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Data Kelas</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>