<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas (username, password, nama_petugas, level)
    VALUES ('$username','$password','$nama_petugas','$level')";
    try {
        $result = mysqli_query($db, $sql);
    } catch (mysqli_sql_exception $e) {
        $session->flash('Username telah digunakan');
        header('location: ');
        exit;
    }

    header('location: petugas.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
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
        <div class="bg-danger text-white px-2"><?= $session->get_flash() ?></div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" required name="username" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" required name="password" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_petugas">Nama Petugas</label>
                    <input type="text" required name="nama_petugas" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="level">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Petugas</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>