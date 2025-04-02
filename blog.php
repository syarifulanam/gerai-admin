<?php
session_start();
require 'check.php';
require 'function-user.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="img/icon-geraipajak.png">

    <title>Blog</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include 'navbar-left.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'navbar-top.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container mt-5">
                    <section class="d-flex">
                        <main class="main-blog">
                            <div class="card main-blog-card mb-5">
                                <img src="upload/blog/laptop1.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">My Blog</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <p class="card-text">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </p>
                                    <a href="#" class="btn btn-primary">Read more</a>
                                </div>
                            </div>

                            <div class="card main-blog-card mb-5">
                                <img src="upload/blog/laptop_Dell.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Blog</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <p class="card-text">
                                        <small class="text-body-secondary">Last updated 3 mins ago</small>
                                    </p>
                                    <a href="#" class="btn btn-primary">Read more</a>
                                </div>
                            </div>

                        </main>
                        <aside class="aside-main">
                            <div class="list-group category-aside">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                    Category
                                </a>
                                <a href="#" class="list-group-item list-group-item-action">Category 1</a>
                                <a href="#" class="list-group-item list-group-item-action">Category 2</a>
                                <a href="#" class="list-group-item list-group-item-action">Category 3</a>
                            </div>
                        </aside>
                    </section>
                </div>
                <!-- /.container-fluid -->
                <div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>
</body>

</html>