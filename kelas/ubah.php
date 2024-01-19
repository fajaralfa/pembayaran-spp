<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
    $sql = "UPDATE kelas
        SET nama_kelas = '$nama_kelas',
        kompetensi_keahlian = '$kompetensi_keahlian'
        WHERE id_kelas = $id_kelas";
    mysqli_query($db, $sql);
    header('location: index.php');
    exit;
}

?>

<!-- Header -->
<?php
$title = 'Ubah Data Kelas';
require_once '../layout/header.php';
?>

<?php
$id_kelas = $_GET['id_kelas'];
$sql = "SELECT * FROM kelas WHERE id_kelas = $id_kelas";
$result = mysqli_query($db, $sql);
$kelas = mysqli_fetch_assoc($result);
?>

<div class="card" style="width: 35%;">
    <div class="card-body">
        <form action="" method="post">
            <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
            <div class="mb-3">
                <label for="nama_kelas" class="form-label">Nama Kelas</label>
                <input type="text" name="nama_kelas" value="<?= $kelas['nama_kelas'] ?>" id="" class="form-control">
            </div>
            <div class="mb-3">
                <label for="kompetensi_keahlian" class="form-label">Kompetensi Keahlian</label>
                <input type="text" name="kompetensi_keahlian" value="<?= $kelas['kompetensi_keahlian'] ?>" id="" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Ubah Data Kelas</button>
            </div>
        </form>
    </div>
</div>
</body>

</html>