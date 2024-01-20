<?php
session_start();
$title = 'Data Siswa';
require_once '../layout/header.php';
?>

<?php
require_once '../helper/db.php';

$sql = '';
if(isset($_GET['nama'])) {
    $sql = "SELECT * FROM siswa, kelas, spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp
        AND nama LIKE '%$_GET[nama]%'";
} else {
    $sql = "SELECT * FROM siswa, kelas, spp WHERE siswa.id_kelas = kelas.id_kelas AND siswa.id_spp = spp.id_spp";
}

$result = mysqli_query($db, $sql);
$data_siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="card" style="width: 95%;">
    <div class="card-header">
        <div class="d-flex align-items-center gap-5">
            <a href="tambah.php" class="btn btn-primary">Tambah Siswa</a>
            <form action="" class="d-flex gap-2">
                <input name="nama" placeholder="Nama siswa" class="form-control">
                <button type="submit" class="btn btn-warning">Cari</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>ALAMAT</th>
                    <th>NO TELPON</th>
                    <th>SPP</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_siswa as $siswa) { ?>
                    <tr>
                        <td><?= $siswa['nisn'] ?></td>
                        <td><?= $siswa['nis'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['nama_kelas'] ?></td>
                        <td><?= $siswa['alamat'] ?></td>
                        <td><?= $siswa['no_telp'] ?></td>
                        <td><?= $siswa['tahun'] ?></td>
                        <td class="text-center">
                            <a onclick="return confirm('Anda ingin menghapus data siswa ini?')" href="hapus.php?nisn=<?= $siswa['nisn'] ?>" class="btn btn-danger">Hapus</a>
                            <a href="ubah.php?nisn=<?= $siswa['nisn'] ?>" class="btn btn-primary">Ubah</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>
