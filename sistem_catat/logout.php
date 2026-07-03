<?php
session_start(); //Memulai session
session_destroy(); //Menghapus semua session
header('location:login.php'); //Mengalihkan ke halaman login
?>