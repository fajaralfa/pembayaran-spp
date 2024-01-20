<?php
require_once '../helper/db.php';

$nisn = $_GET['nisn'];

$sql = "SELECT nama, nama_kelas FROM siswa, kelas WHERE nisn = $nisn AND siswa.id_kelas = kelas.id_kelas";
$result = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM pembayaran, spp, petugas, siswa, kelas WHERE pembayaran.nisn = '$nisn' AND siswa.id_kelas = kelas.id_kelas AND pembayaran.nisn = siswa.nisn AND pembayaran.id_spp = spp.id_spp AND pembayaran.id_petugas = petugas.id_petugas";
$result = mysqli_query($db, $sql);
$data_pembayaran = mysqli_fetch_all($result, MYSQLI_ASSOC);

header('content-type: application/vnd.ms-excel');
header("content-disposition: attachment; filename=\"Laporan SPP $siswa[nama] $siswa[nama_kelas].xls\"");
?>

<div class="card" style="width: 95%;">
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

