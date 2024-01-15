<?php
$title = 'Data Kelas';
require_once '../layout/header.php';
?>

    <?php
    require_once '../helper/db.php';

    $sql = "SELECT * FROM spp";
    $result = mysqli_query($db, $sql);
    $data_spp = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="card" style="width: 40%;">
        <div class="card-header">
            <a href="tambah_spp.php" class="btn btn-primary">Tambah Data SPP</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID SPP</th>
                        <th>TAHUN</th>
                        <th>NOMINAL</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_spp as $spp) { ?>
                        <tr>
                            <td><?= $spp['id_spp'] ?></td>
                            <td><?= $spp['tahun'] ?></td>
                            <td><?= $spp['nominal'] ?></td>
                            <td class="text-center">
                                <a onclick="return confirm('Hapus data SPP ini?')" href="hapus_spp.php?id_spp=<?= $spp['id_spp'] ?>" class="btn btn-danger">Hapus</a>
                                <a href="ubah_spp.php?id_spp=<?= $spp['id_spp'] ?>" class="btn btn-primary">Ubah</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>