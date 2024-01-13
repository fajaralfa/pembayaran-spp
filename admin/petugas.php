<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
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

    $sql = "SELECT * FROM petugas";
    $result = mysqli_query($db, $sql);
    $data_petugas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="card" style="width: 75%;">
        <div class="card-header">
            <a href="tambah_petugas.php" class="btn btn-primary">Tambah Petugas</a>
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
                                <a onclick="return confirm('Hapus data petugas ini?')" href="hapus_petugas.php?id_petugas=<?= $petugas['id_petugas'] ?>" class="btn btn-danger">Hapus</a>
                                <form action="ubah_petugas.php">
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
</body>

</html>