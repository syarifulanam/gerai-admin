<?php
require 'function-conn.php';


if (isset($_POST['addBlog'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category_id = $_POST['category'];

    // Jika ada file yang diupload
    $file_name = "";
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = "images/" . $file_name;
        move_uploaded_file($file_tmp, $file_destination);
    }

    $insertQuery = "INSERT INTO posts (title, content, category_id, media) 
                    VALUES ('$title', '$content', '$category_id', '$file_name')";

    if (mysqli_query($conn, $insertQuery)) {
        $_SESSION['message'] = "Blog added successfully!";
    } else {
        $_SESSION['message'] = "Error adding blog: " . mysqli_error($conn);
    }
    header("Location: blog.php");
}

if (isset($_POST['updateBlog'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Jika ada file yang diupload
    $file_name = "";
    $query = "";
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_destination = "images/" . $file_name;
        move_uploaded_file($file_tmp, $file_destination);

        $query = "UPDATE posts SET title='$title', content='$content', category_id='$category', media='$file_name' WHERE id='$id'";
    } else {
        $query = "UPDATE posts SET title='$title', content='$content', category_id='$category' WHERE id='$id'";
    }


    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Blog updated successfully!'); window.location.href='blog.php';</script>";
    } else {
        echo "<script>alert('Failed to update blog!');</script>";
    }
}


if (isset($_POST['hapusBlog'])) {
    $id = $_POST['id'];

    // Debugging: Periksa apakah ID benar-benar terkirim
    var_dump($id);
    die();

    $query = "DELETE FROM posts WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Blog deleted successfully!'); window.location.href='blog.php';</script>";
    } else {
        die("Error deleting blog: " . mysqli_error($conn));
    }
}


function shortenText($text, $limit = 100)
{
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . "...";
    }
    return $text;
}
