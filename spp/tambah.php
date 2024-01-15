<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $sql = "INSERT INTO spp (tahun, nominal) VALUES ($tahun, $nominal)";
    mysqli_query($db, $sql);
    header('location: index.php');
    exit;
}

?>

<?php
$title = 'Data Kelas';
require_once '../layout/header.php';
?>

    <div class="card" style="width: 35%;">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun SPP</label>
                    <input type="number" name="tahun" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" name="nominal" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Tambah Data SPP</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>