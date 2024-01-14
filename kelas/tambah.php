<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $sql = "INSERT INTO kelas (nama_kelas, kompetensi_keahlian) VALUES ('$nama_kelas', '$kompetensi_keahlian')";
    mysqli_query($db, $sql);
    header('location: index.php');
    exit;
}

?>

<!-- Header -->
<?php
$title = 'Tambah Data Kelas';
require_once '../layout/header.php';
?>

<div class="card" style="width: 35%;">
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                <input type="text" name="kompetensi_keahlian" id="" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Tambah Data Kelas</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>