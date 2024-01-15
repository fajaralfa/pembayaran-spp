<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Pembayaran SPP' ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pembayaran SPP</a>
            <a onclick="return confirm('Anda ingin keluar?')" href="../logout.php" class="btn">Logout</a>
        </div>
    </nav>
    <div class="sidenav position-fixed z-1 overflow-x-hidden my-3 p-3" style="width: 180px; left: 10px; background: #eef;">
        <div class="navbar-nav">
            <a class="nav-link" href="siswa/">Data Siswa</a>
            <a class="nav-link" href="kelas/">Data Kelas</a>
            <a class="nav-link" href="petugas/">Data Petugas</a>
            <a class="nav-link" href="spp/">Data SPP</a>
        </div>
    </div>

    <div class="my-3" style="margin-left: 200px;">
