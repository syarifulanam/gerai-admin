<?php
session_start();

// Membuat koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_geraipajak");

//Menambahkan User Baru
if (isset($_POST['addusers'])) {
    $email = $_POST['emailuser'];
    $password = $_POST['password'];

    $queryinsert = mysqli_query($conn, "INSERT INTO login (email, password) VALUES ('$email', '$password')");

    if ($queryinsert) {
        // if berhasil
        header('location: users.php');
    } else {
        // kalau gagal insert ke db
        header('location: users.php');
    }
}


// Edit Data User
if (isset($_POST['updateuser'])) {
    $emailbaru = $_POST['emailuser'];
    $passwordbaru = $_POST['password'];
    $idnya = $_POST['id'];

    $queryupdate = mysqli_query($conn, "UPDATE login SET email='$emailbaru', password='$passwordbaru' WHERE iduser='$idnya'");

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
    $querydelete = mysqli_query($conn, "DELETE FROM login WHERE iduser = '$id'");

    if ($querydelete) {
        header('location: users.php');
    } else {
        header('location: users.php');
    }
}
