<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data SPP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pembayaran SPP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="siswa.php">Data Siswa</a>
                    <a class="nav-link" href="kelas.php">Data Kelas</a>
                    <a class="nav-link" href="petugas.php">Data Petugas</a>
                    <a class="nav-link" href="spp.php">Data SPP</a>
                </div>
            </div>
        </div>
    </nav>

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