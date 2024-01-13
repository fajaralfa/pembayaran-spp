<?php
session_start();
require_once 'helper/session.php';
require_once 'helper/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ambil data dari database
    $sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    $user = mysqli_fetch_assoc($result);

    // bandingkan data dari form dengan data
    if ($user != null) {
        /* skenario jika username dan password sesuai */
        // simpan data user yang sudah login
        $_SESSION['spp_petugas'] = $user['username'];
        $_SESSION['spp_level_petugas'] = $user['level'];

        if ($user['level'] == 'admin') {
            header('location: admin/');
        } elseif ($user['level'] == 'petugas') {
            header('location: petugas/');
        }
    } else {
        /* skenario jika username atau password salah */
        // tampilkan pesan 'username atau password salah' melalui session (belum)
        $session->flash('Username atau password salah!');
        header('location: login_petugas.php');
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
    <title>Login Petugas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 550px;">
            <form action="" method="post" class="w-25">
                <div>
                    <?php
                    if (isset($_SESSION['flash'])) {
                        $message = $_SESSION['flash'];
                        unset($_SESSION['flash']);
                        echo $message;
                    }
                    ?>
                </div>
                <h1 class="text-center">Login Petugas</h1>
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" name="username" class="form-control" id="">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>