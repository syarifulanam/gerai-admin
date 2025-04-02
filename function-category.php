<?php
require 'function-conn.php';

if (isset($_POST['addCategory'])) {
    var_dump($_POST); // Tambahkan ini untuk debugging
    $name = $_POST['name'];

    if (empty($name)) {
        echo "<script>alert('Category name cannot be empty');</script>";
    } else {
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            echo "<script>alert('Category added successfully'); window.location='category.php';</script>";
        } else {
            echo "<script>alert('Failed to add category');</script>";
            echo "Error: " . $stmt->error; // Debugging
        }
        $stmt->close();
    }
}

if (isset($_POST['updateCategory'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (!empty($id) && is_numeric($id) && !empty($name)) {
        $stmt = $conn->prepare("UPDATE categories SET name=? WHERE id=?");
        $stmt->bind_param("si", $name, $id);  // "s" untuk string, "i" untuk integer
        if ($stmt->execute()) {
            header("Location: category.php");
            exit();
        } else {
            echo "<script>alert('Failed to update category');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Invalid category data');</script>";
    }
}

if (isset($_POST['hapusCategory'])) {
    $id = $_POST['id'];

    if (!empty($id) && is_numeric($id)) {
        $stmt = $conn->prepare("DELETE FROM categories WHERE id=?");
        $stmt->bind_param("i", $id);  // "i" berarti integer
        if ($stmt->execute()) {
            header("Location: category.php");
            exit();
        } else {
            echo "<script>alert('Failed to delete category');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Invalid category ID');</script>";
    }
}
