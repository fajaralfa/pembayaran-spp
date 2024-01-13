<?php

session_start();

unset($_SESSION['spp_petugas']);
unset($_SESSION['spp_level_petugas']);

header('location: ../index.php');