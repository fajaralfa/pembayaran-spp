<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    $sql = "INSERT INTO siswa VALUES (
        '$nisn', '$nis', '$nama', $id_kelas, '$alamat', '$no_telp', $id_spp
        )";
    try {
        $result = mysqli_query($db, $sql);
    } catch (mysqli_sql_exception $e) {
        echo $e;
        exit;
    }

    header('location: ./');
    exit;
}

?>

<?php
$title = 'Tambah Data Siswa';
require_once '../layout/header.php';
?>

    <div class="card" style="width: 35%;">
        <div class="bg-danger text-white px-2"><?= $session->get_flash() ?></div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">NAMA</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="id_kelas" class="form-label">ID KELAS</label>
                    <input type="text" name="id_kelas" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">ALAMAT</label>
                    <input type="text" name="alamat" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label">NO TELPON</label>
                    <input type="text" name="no_telp" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="id_spp" class="form-label">ID SPP</label>
                    <input type="text" name="id_spp" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once '../layout/footer.php' ?>
