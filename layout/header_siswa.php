<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pembayaran SPP' ?></title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-brand">Pembayaran SPP</div>
            <div class="d-flex align-items-center lead">
                <span><?= $_SESSION['spp_nama_siswa'] ?></span>
                <a onclick="return confirm('Anda ingin keluar?')" href="../logout.php" class="btn">Logout</a>
            </div>
        </div>
    </nav>

    <div class="m-3">
