<?php
session_start();
$title = 'Riwayat Pembayaran';
require_once '../layout/header_siswa.php';
?>

<?php
require_once '../helper/db.php';

$nisn = $_SESSION['spp_nisn_siswa'];
$sql = "SELECT * FROM pembayaran, spp, petugas, siswa, kelas WHERE pembayaran.nisn = '$nisn' AND siswa.id_kelas = kelas.id_kelas AND pembayaran.nisn = siswa.nisn AND pembayaran.id_spp = spp.id_spp AND pembayaran.id_petugas = petugas.id_petugas";
$result = mysqli_query($db, $sql);
$data_pembayaran = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="card">
    <div class="card-header">
        <a href="laporan_siswa.php" class="btn btn-info">Unduh Laporan</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>NAMA SISWA</th>
                    <th>KELAS</th>
                    <th>TAHUN SPP</th>
                    <th>NOMINAL</th>
                    <th>JUMLAH BAYAR</th>
                    <th>TANGGAL BAYAR</th>
                    <th>PETUGAS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_pembayaran as $data) { ?>
                    <tr>
                        <td><?= $data['nisn'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nama_kelas'] ?></td>
                        <td><?= $data['tahun'] ?></td>
                        <td><?= $data['nominal'] ?></td>
                        <td><?= $data['jumlah_bayar'] ?></td>
                        <td><?= $data['tgl_bayar'] ?></td>
                        <td><?= $data['nama_petugas'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<?php require_once '../layout/footer.php' ?>
