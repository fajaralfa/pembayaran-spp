<?php
$title = 'Data Petugas';
require_once '../layout/header.php';
?>

    <?php
    require_once '../helper/db.php';

    $sql = "SELECT * FROM petugas";
    $result = mysqli_query($db, $sql);
    $data_petugas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="card" style="width: 75%;">
        <div class="card-header">
            <a href="tambah.php" class="btn btn-primary">Tambah Petugas</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID PETUGAS</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>NAMA PETUGAS</th>
                        <th>LEVEL</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_petugas as $petugas) { ?>
                        <tr>
                            <td><?= $petugas['id_petugas'] ?></td>
                            <td><?= $petugas['username'] ?></td>
                            <td><?= $petugas['password'] ?></td>
                            <td><?= $petugas['nama_petugas'] ?></td>
                            <td><?= $petugas['level'] ?></td>
                            <td class="d-flex justify-content-center gap-2">
                                <a onclick="return confirm('Hapus data petugas ini?')" href="hapus.php?id_petugas=<?= $petugas['id_petugas'] ?>" class="btn btn-danger">Hapus</a>
                                <form action="ubah.php">
                                    <input type="hidden" name="id_petugas" value="<?= $petugas['id_petugas'] ?>">
                                    <input type="hidden" name="username" value="<?= $petugas['username'] ?>">
                                    <input type="hidden" name="password" value="<?= $petugas['password'] ?>">
                                    <input type="hidden" name="nama_petugas" value="<?= $petugas['nama_petugas'] ?>">
                                    <input type="hidden" name="level" value="<?= $petugas['level'] ?>">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once '../layout/footer.php' ?>
