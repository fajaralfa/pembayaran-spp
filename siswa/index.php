<?php
session_start();
$title = 'Data Siswa';
require_once '../layout/header.php';
?>

<?php
require_once '../helper/db.php';

$sql = "SELECT * FROM siswa";
$result = mysqli_query($db, $sql);
$data_siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="card" style="width: 95%;">
    <div class="card-header">
        <a href="tambah.php" class="btn btn-primary">Tambah Siswa</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>ID KELAS</th>
                    <th>ALAMAT</th>
                    <th>NO TELPON</th>
                    <th>ID SPP</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_siswa as $siswa) { ?>
                    <tr>
                        <td><?= $siswa['nisn'] ?></td>
                        <td><?= $siswa['nis'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['id_kelas'] ?></td>
                        <td><?= $siswa['alamat'] ?></td>
                        <td><?= $siswa['no_telp'] ?></td>
                        <td><?= $siswa['id_spp'] ?></td>
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
