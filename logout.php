<?php

session_start();

unset($_SESSION['spp_petugas']);
unset($_SESSION['spp_nama_petugas']);
unset($_SESSION['spp_level_petugas']);

header('location: login_petugas.php');
