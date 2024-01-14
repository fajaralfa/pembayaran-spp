<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_petugas = $_POST['id_petugas'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "UPDATE petugas SET username = '$username', password = '$password',
    nama_petugas = '$nama_petugas', level = '$level'
    WHERE id_petugas = '$id_petugas'";

    try {
        $result = mysqli_query($db, $sql);
    } catch (mysqli_sql_exception $e) {
        $session->flash('Username telah digunakan');
        header('location: ');
        exit;
    }

    header('location: ./');
    exit;
}

?>

<?php
$title = 'Data Petugas';
require_once '../layout/header.php';
?>

    <div class="card" style="width: 35%;">
        <div class="bg-danger text-white px-2"><?= $session->get_flash() ?></div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id_petugas" value="<?= $_GET['id_petugas'] ?>">
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" required name="username" id="" value="<?= $_GET['username'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" required name="password" id="" value="<?= $_GET['password'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_petugas">Nama Petugas</label>
                    <input type="text" required name="nama_petugas" value="<?= $_GET['nama_petugas'] ?>" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="level">Level</label>
                    <select name="level" id="" class="form-select">
                        <option value="admin" <?= $_GET['level'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="petugas" <?= $_GET['level'] === 'petugas' ? 'selected' : '' ?>>Petugas</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Ubah Petugas</button>
                </div>
            </form>
        </div>
    </div>

<?php require_once '../layout/footer.php' ?>
