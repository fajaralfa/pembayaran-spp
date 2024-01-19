<?php

require_once '../helper/db.php';
require_once '../helper/session.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_spp = $_POST['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];
    $sql = "UPDATE spp SET tahun = $tahun,
        nominal = $nominal WHERE id_spp = $id_spp";
    mysqli_query($db, $sql);
    header('location: index.php');
    exit;
}

?>

<?php
$title = 'Data Kelas';
require_once '../layout/header.php';
?>

    <?php
    $sql = "SELECT * FROM spp WHERE id_spp = $_GET[id_spp]";
    $result = mysqli_query($db, $sql);
    $spp = mysqli_fetch_assoc($result);
    ?>

    <div class="card" style="width: 35%;">
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="id_spp" value="<?= $spp['id_spp'] ?>">
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun SPP</label>
                    <input type="number" name="tahun" id="" value="<?= $spp['tahun'] ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="nominal" class="form-label">Nominal</label>
                    <input type="number" name="nominal" value="<?= $spp['nominal'] ?>" id="" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Ubah Data SPP</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>