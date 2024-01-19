<?php
session_start();
require_once '../helper/session.php';
require_once '../helper/db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // proses pembayaran
    $id_petugas = $_SESSION['spp_petugas'];
    $nisn = $_POST['nisn'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $id_spp = $_POST['id_spp'];
    $jumlah_bayar = $_POST['jumlah_bayar'];

    $sql = "INSERT INTO pembayaran (id_petugas, nisn, tgl_bayar, id_spp, jumlah_bayar) VALUES
    ($id_petugas, '$nisn', '$tgl_bayar', $id_spp, $jumlah_bayar)
    ";
    $result = mysqli_query($db, $sql);
    if(!$result) {
        echo mysqli_error($db);
    }
    header('location: pilih_siswa.php');
    exit;
}
?>

<?php
$title = 'Entri Pembayaran';
require_once '../layout/header.php';
?>

<div class="card" style="width: 550px;">
    <div class="bg-danger text-white px-2"><?= $session->get_flash() ?></div>
    <div class="card-body">
        <form action="" method="post">
            <!-- input hidden adalah data otomatis -->
            <input type="hidden" name="nisn" value="<?= $_GET['nisn'] ?>">
            <input type="hidden" name="id_spp" value="<?= $_GET['id_spp'] ?>">
            <div class="mb-3">
                <label class="form-label" for="tgl_bayar">Tanggal Bayar</label>
                <input type="date" required name="tgl_bayar" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label" for="jumlah_bayar">Jumlah Bayar (sisa yang belum dibayar adalah <b><?= number_format($_GET['kekurangan'], 2, ',') ?></b>)</label>
                <input type="number" required name="jumlah_bayar" id="" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
        </form>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>