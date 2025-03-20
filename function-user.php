<?php
session_start();

// Membuat koneksi ke database
$conn = mysqli_connect("127.0.0.1", "root", "", "geraiadmin");

//Menambahkan User Baru
if (isset($_POST['addusers'])) {
    $email = $_POST['emailuser'];
    $password = $_POST['password']; // Ambil password dari form
    $passwordHash = password_hash($password, PASSWORD_DEFAULT); // Hash password sebelum disimpan

    // echo "email : " . $email . "<br>";
    // echo "password : " . $password . "<br>";
    // echo "passwordHash : " . $passwordHash . "<br>";

    $queryinsert = mysqli_query($conn, "INSERT INTO users (email, password) VALUES ('$email', '$passwordHash')");
    if ($queryinsert) {
        header('location: users.php');
    } else {
        echo "Error: " . mysqli_error($conn); // Tampilkan pesan error dari MySQL
    }
}

// Edit Data User
if (isset($_POST['updateuser'])) {
    $emailbaru = $_POST['emailuser'];
    $passwordbaru = $_POST['password'];
    $idnya = $_POST['id'];

    $passwordbaru_hashed = password_hash($passwordbaru, PASSWORD_DEFAULT);
    $queryupdate = mysqli_query($conn, "UPDATE users SET email='$emailbaru', password='$passwordbaru_hashed' WHERE iduser='$idnya'");

    if ($queryupdate) {
        header('location: users.php');
    } else {
        echo "Gagal mengupdate admin: " . mysqli_error($conn);
    }
}

// Hapus User
if (isset($_POST['hapususer'])) {
    $id = $_POST['id']; // Pastikan id dikirim dari form

    // Query untuk menghapus user
    $querydelete = mysqli_query($conn, "DELETE FROM users WHERE iduser = '$id'");

    if ($querydelete) {
        header('location: users.php');
    } else {
        header('location: users.php');
    }
}
