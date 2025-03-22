<?php
// ini untuk cek dia sudah login atau belum
// jika belum login maka pergi ke halaman login
if (!isset($_SESSION['log'])) {
    header('location: login.php');
}

// if(isset($_SESSION['log'])){

// } else {
//     header('location: login.php');
// }
