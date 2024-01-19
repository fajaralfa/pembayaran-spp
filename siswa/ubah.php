<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nisn_lama = $_GET['nisn'];
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    $sql = "UPDATE siswa SET nisn = '$nisn', nis = '$nis', nama = '$nama', id_kelas = $id_kelas,
    alamat = '$alamat', no_telp = '$no_telp', id_spp = $id_spp WHERE nisn = '$nisn_lama'";
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
$title = 'Ubah Data Siswa';
require_once '../layout/header.php';
?>

<?php
$nisn = $_GET['nisn'];
$sql = "SELECT * FROM siswa WHERE nisn = $nisn";
$result = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($result);
?>

<div class="card" style="width: 35%;">
    <div class="bg-danger text-white px-2"><?= $session->get_flash() ?></div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN</label>
                <input type="text" name="nisn" value="<?= $siswa['nisn'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS</label>
                <input type="text" name="nis" value="<?= $siswa['nis'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" name="nama" value="<?= $siswa['nama'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT id_kelas, nama_kelas FROM kelas";
                $result = mysqli_query($db, $sql);
                $data_kelas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <label for="id_kelas" class="form-label">KELAS</label>
                <select name="id_kelas" id="id_kelas" class="form-select">
                    <?php foreach ($data_kelas as $kelas) { ?>
                        <option value="<?= $kelas['id_kelas'] ?>" <?= $siswa['id_kelas'] == $kelas['id_kelas'] ? 'selected' : '' ?>><?= $kelas['nama_kelas'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">ALAMAT</label>
                <input type="text" name="alamat" value="<?= $siswa['alamat'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">NO TELPON</label>
                <input type="text" name="no_telp" value="<?= $siswa['no_telp'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM spp";
                $result = mysqli_query($db, $sql);
                $data_spp = mysqli_fetch_all($result, MYSQLI_ASSOC);
                ?>
                <label for="id_spp" class="form-label">SPP</label>
                <select name="id_spp" id="id_spp" class="form-select">
                    <?php foreach ($data_spp as $spp) { ?>
                        <option value="<?= $spp['id_spp'] ?>" <?= $siswa['id_spp'] == $spp['id_spp'] ? 'selected' : '' ?>><?= $spp['tahun'] . ' | Rp.' . number_format($spp['nominal']) ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Ubah Siswa</button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>