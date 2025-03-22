<?php
require 'function-conn.php';

//Cek login, terdaftar apa tidak
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cekdatabase = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $data = mysqli_fetch_assoc($cekdatabase);
    // print_r($data);

    // Periksa password
    if ($data && password_verify($password, $data['password'])) {
        echo "password benar";
        $_SESSION['log'] = 'True';
        header('location: index.php');
        exit;
    } else {
        echo "<script>alert('Email atau password salah!'); window.location.href='login.php';</script>";
    }
}
