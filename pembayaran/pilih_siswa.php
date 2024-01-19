<?php
session_start();
$title = 'Entri Pembayaran';
require_once '../layout/header.php';
?>

<?php
require_once '../helper/db.php';

$sql = "SELECT * FROM siswa, kelas, spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp";
$result = mysqli_query($db, $sql);
$data_siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="card" style="width: 95%;">
    <div class="card-header">
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>SPP</th>
                    <th>NOMINAL</th>
                    <th>SUDAH DIBAYAR</th>
                    <th>KEKURANGAN</th>
                    <th>STATUS</th>
                    <th>HISTORY</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_siswa as $siswa) { ?>
                    <?php
                    $sql = "SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn = '$siswa[nisn]'";
                    $result = mysqli_query($db, $sql);
                    $pembayaran = mysqli_fetch_assoc($result);
                    $kekurangan = $siswa['nominal'] - $pembayaran['jumlah_bayar'];
                    ?>
                    <tr>
                        <td><?= $siswa['nisn'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['nama_kelas'] ?></td>
                        <td><?= $siswa['tahun'] ?></td>
                        <td><?= number_format($siswa['nominal'], 2, ',') ?></td>
                        <td><?= number_format($pembayaran['jumlah_bayar'], 2, ',') ?></td>
                        <td><?= number_format($kekurangan, 2, ',') ?></td>
                        <td>
                            <?php if ($kekurangan == 0) { ?>
                                <div class="badge bg-success">Lunas</div>
                            <?php } else { ?>
                                <a href="<?= "entri.php?nisn=$siswa[nisn]&id_spp=$siswa[id_spp]&kekurangan=$kekurangan" ?>" class="badge btn btn-warning">Pilih & Bayar</a>
                            <?php } ?>
                        </td>
                        <td><a href="riwayat.php?nisn=<?= $siswa['nisn'] ?>" class="badge btn btn-info">Riwayat Pembayaran</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../layout/footer.php' ?>