<?php
require 'function-conn.php';

//Add Gallery
if (isset($_POST['addGallery'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Proses Upload File
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $uploadDir = "images/";

    if ($fileName != "") {
        // Gunakan timestamp agar nama file unik
        $newFileName = time() . "_" . $fileName;
        $filePath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmp, $filePath)) {
            // Jika upload berhasil, simpan ke database
            $query = "INSERT INTO gallery (name, description, picture) VALUES ('$name', '$description', '$newFileName')";
        } else {
            echo "<script>alert('File gagal diupload!');</script>";
            exit();
        }
    } else {
        // Jika tidak ada file yang diupload
        $query = "INSERT INTO gallery (name, description) VALUES ('$name', '$description')";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Gallery berhasil ditambahkan!'); window.location.href='gallery.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan gallery!');</script>";
    }
}

//Update Gallery
if (isset($_POST['updateGallery'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (!empty($_FILES['file']['name'])) {
        $filename = basename($_FILES['file']['name']);
        $tempname = $_FILES['file']['tmp_name'];
        $folder = "images/" . $filename;

        // Validasi format file
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['file']['type'], $allowed_types)) {
            die("Format gambar tidak valid!");
        }

        // Pindahkan file
        if (move_uploaded_file($tempname, $folder)) {
            // Query update dengan gambar
            $query = "UPDATE gallery SET name='$name', description='$description', picture='$filename' WHERE id='$id'";
        } else {
            die("Gagal mengupload gambar! Error code: " . $_FILES['file']['error']);
        }
    } else {
        // Query update tanpa mengubah gambar
        $query = "UPDATE gallery SET name='$name', description='$description' WHERE id='$id'";
    }

    // Jalankan query dan cek error
    $update = mysqli_query($conn, $query);

    if (!$update) {
        die("Error SQL: " . mysqli_error($conn));
    } else {
        header("Location: gallery.php");
        exit;
    }
}

//Delete Gallery
if (isset($_POST['deleteGallery'])) {
    $id = $_POST['id'];

    // Cek apakah ID dikirim
    if (empty($id)) {
        die("Error: ID tidak ditemukan!");
    }

    // Ambil informasi gambar
    $query = mysqli_query($conn, "SELECT picture FROM gallery WHERE id = '$id'");

    if (!$query) {
        die("Error pada query SELECT: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        die("Error: Data tidak ditemukan di database!");
    }

    $picture = $data['picture'];

    // Cek apakah file gambar ada sebelum dihapus
    if ($picture) {
        $filePath = "images/$picture";
        if (file_exists($filePath)) {
            if (!unlink($filePath)) {
                die("Error: Gagal menghapus file gambar!");
            }
        } else {
            echo "File gambar tidak ditemukan atau sudah terhapus.<br>";
        }
    }

    // Hapus data dari database
    $delete = mysqli_query($conn, "DELETE FROM gallery WHERE id = '$id'");

    if (!$delete) {
        die("Error pada query DELETE: " . mysqli_error($conn));
    }

    // Redirect ke halaman gallery setelah sukses
    echo "<script>alert('Data berhasil dihapus!'); window.location.href='gallery.php';</script>";
    exit();
}
