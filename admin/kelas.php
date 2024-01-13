<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas</title>
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

    $sql = "SELECT * FROM kelas";
    $result = mysqli_query($db, $sql);
    $data_kelas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="card" style="width: 60%;">
        <div class="card-header">
            <a href="tambah_kelas.php" class="btn btn-primary">Tambah Kelas</a>
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
                            <td class="d-flex gap-3 justify-content-center">
                                <a onclick="return confirm('Anda ingin menghapus sekolah ini?')" href="hapus_kelas.php?id_kelas=<?= $kelas['id_kelas'] ?>" class="btn btn-danger">Hapus</a>
                                <form action="ubah_kelas.php">
                                    <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>" id="">
                                    <input type="hidden" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>" id="">
                                    <input type="hidden" name="kompetensi_keahlian" value="<?= $kelas['kompetensi_keahlian'] ?>" id="">
                                    <button class="btn btn-primary">Ubah</button>
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