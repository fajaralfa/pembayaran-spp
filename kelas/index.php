<?php
session_start();
$title = 'Data Kelas';
require_once '../layout/header.php';
?>

<?php
require_once '../helper/db.php';

$sql = "SELECT * FROM kelas";
$result = mysqli_query($db, $sql);
$data_kelas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="card" style="width: 70%;">
    <div class="card-header">
        <a href="tambah.php" class="btn btn-primary">Tambah Kelas</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID KELAS</th>
                    <th>NAMA KELAS</th>
                    <th>KOMPETENSI KEAHLIAN</th>
                    <th class="text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_kelas as $kelas) { ?>
                    <tr>
                        <td><?= $kelas['id_kelas'] ?></td>
                        <td><?= $kelas['nama_kelas'] ?></td>
                        <td><?= $kelas['kompetensi_keahlian'] ?></td>
                        <td class="text-center">
                            <a onclick="return confirm('Anda ingin menghapus data kelas ini?')" href="hapus.php?id_kelas=<?= $kelas['id_kelas'] ?>" class="btn btn-danger">Hapus</a>
                            <a href="ubah.php?id_kelas=<?= $kelas['id_kelas'] ?>" class="btn btn-primary">Ubah</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>
