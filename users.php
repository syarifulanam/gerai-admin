<?php
require 'function.php';
require 'cek.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Users</title>

    <!-- Custom fonts for this template-->
    <link
        href="vendor/fontawesome-free/css/all.min.css"
        rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul
            class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a
                class="sidebar-brand d-flex align-items-center justify-content-center"
                href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gerai <sup>Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                    <span>Logout</span></a>
            </li>

            <!-- Nav Item - User -->
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg> <span>Users</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddBarang">
                        Add Users
                    </button>
                    <div class="modal fade" id="modalAddBarang">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Users</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Email User</label>
                                            <input type="email" name="emailuser" class="form-control" placeholder="masukan email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="masukan password baru" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success" name="addusers">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Email User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $ambilsemuadataadmin = mysqli_query($conn, "SELECT * FROM login");
                            if (!$ambilsemuadataadmin) {
                            }
                            $i = 1;
                            while ($data = mysqli_fetch_array($ambilsemuadataadmin)) {
                                $em = $data['email'];
                                $iduser = $data['iduser'];
                                $pw = $data['password'];
                            ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $em; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $iduser; ?>">Edit</button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $iduser; ?>">Delete</button>
                                    </td>
                                </tr>

                                <!-- Edit Admin -->
                                <div class="modal fade" id="edit<?= $iduser; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="users.php">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Users</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email User</label>
                                                        <input type="email" name="emailuser" value="<?= $em; ?>" class="form-control" placeholder="masukan email baru" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <input type="password" name="password" value="<?= $pw; ?>" class="form-control" placeholder="masukan password baru">
                                                    </div>
                                                    <input type="hidden" name="id" value="<?= $iduser; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-warning" name="updateuser">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Admin Modal -->
                                <div class="modal fade" id="delete<?= $iduser; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="users.php">
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete User</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <!-- Modal Body -->
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus <?= htmlspecialchars($em); ?>?
                                                    <input type="hidden" name="id" value="<?= $iduser; ?>">
                                                </div>
                                                <!-- Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger" name="hapususer">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            };


                            ?>

                            <!-- Topbar Search -->
                            <form
                                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                <div class="input-group">
                                    <input
                                        type="text"
                                        class="form-control bg-light border-0 small"
                                        placeholder="Search for..."
                                        aria-label="Search"
                                        aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </nav>

                </div>
            </div>


        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>