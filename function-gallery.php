<?php
require 'function-conn.php';


if (isset($_POST['addGallery'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Handle file upload
    $target_dir = "uploads/"; // Folder untuk menyimpan gambar
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file yang diunggah adalah gambar
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check === false) {
        echo "File bukan gambar.";
        exit();
    }

    // Pindahkan file yang diunggah ke folder tujuan
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Simpan ke database
        $sql = "INSERT INTO gallery (name, description, picture) VALUES ('$name', '$description', '$target_file')";
        if (mysqli_query($conn, $sql)) {
            echo "Gambar berhasil ditambahkan!";
            header("Location: gallery.php"); // Redirect kembali ke halaman gallery
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
?>