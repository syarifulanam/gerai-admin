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

// if (isset($_POST['addGallery'])) {
//     $name = $_POST['name'];
//     $description = $_POST['description'];

//     // Proses Upload File
//     $fileName = $_FILES['file']['name'];
//     $fileTmp = $_FILES['file']['tmp_name'];
//     $uploadDir = "images/";

//     if ($fileName != "") {
//         move_uploaded_file($fileTmp, $uploadDir . $fileName);
//     } else {
//         $fileName = NULL;
//     }

//     // Simpan ke database
//     $query = "INSERT INTO gallery (name, description, picture) VALUES ('$name', '$description', '$fileName')";
//     if (mysqli_query($conn, $query)) {
//         echo "<script>alert('Gallery added successfully!'); window.location.href='gallery.php';</script>";
//     } else {
//         echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
//     }
// }

//Update Gallery
if (isset($_POST['updateGallery'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Cek jika ada file yang diunggah
    if ($_FILES['file']['name'] != "") {
        $filename = time() . "_" . $_FILES['file']['name'];
        $tempname = $_FILES['file']['tmp_name'];
        $folder = "images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            // Update dengan gambar baru
            $query = "UPDATE gallery SET name='$name', description='$description', picture='$filename' WHERE iduser='$id'";
        }
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE gallery SET name='$name', description='$description' WHERE iduser='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Gallery updated successfully!'); window.location.href='gallery.php';</script>";
    } else {
        echo "<script>alert('Failed to update gallery!');</script>";
    }
}
//Delete Gallery
if (isset($_POST['hapusGallery'])) {
    $id = $_POST['id'];

    // Cek apakah gambar terkait ada di folder images
    $query = "SELECT picture FROM gallery WHERE iduser='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($result);

    if ($data['picture'] && file_exists("images/" . $data['picture'])) {
        unlink("images/" . $data['picture']); // Hapus gambar dari folder
    }

    // Hapus dari database
    $query = "DELETE FROM gallery WHERE iduser='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Gallery deleted successfully!'); window.location.href='gallery.php';</script>";
    } else {
        echo "<script>alert('Error deleting data: " . mysqli_error($conn) . "');</script>";
    }
}
