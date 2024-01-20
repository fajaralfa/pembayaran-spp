<?php

session_start();

unset($_SESSION['spp_nisn_siswa']);
unset($_SESSION['spp_nama_siswa']);

header('location: login_siswa.php');
