<?php
session_start();
require_once 'helper/session.php';
require_once 'helper/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ambil data dari form
    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];

    // ambil data dari database
    $sql = "SELECT * FROM siswa WHERE nisn = '$nisn' AND nis = '$nis'";
    $result = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($result);

    // bandingkan data dari form dengan data
    if ($user != null) {
        // simpan data user yang sudah login
        $_SESSION['spp_nisn_siswa'] = $user['nisn'];
        $_SESSION['spp_nama_siswa'] = $user['nama'];

        header('location: pembayaran/riwayat_siswa.php');
    } else {
        $session->flash('NISN atau NIS salah!');
        header('location: login_siswa.php');
    }

    // jangan menampilkan apapun lagi
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Siswa</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 550px;">
            <form action="" method="post" style="width: 20rem;">
                <div>
                <?= $session->get_flash() ?>
                </div>
                <h1 class="text-center">Login Siswa</h1>
                <div class="mb-3">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="text" name="nisn" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="text" name="nis" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <a href="login_petugas.php">Login sebagai petugas</a>
            </form>
        </div>
    </div>
</body>

</html>
