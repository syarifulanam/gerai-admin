<?php
session_start();
require 'check.php';
require 'function-user.php';
require 'function-gallery.php';

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

  <title>Gallery</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
  <style>
    .zoomable {
      width: 100px;
    }

    .zoomable:hover {
      transform: scale(2.5);
      transition: 0.3s ease;
    }
  </style>
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
        <div class="container-fluid">
          <h1 class="h3 mb-2 text-gray-800">Gallery</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data All Gallery</h6>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAddGallery">
                Add Gallery
              </button>
              <div class="modal fade" id="modalAddGallery">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Gallery</h4>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" placeholder="enter name" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Description</label>
                          <input type="text" name="description" class="form-control" placeholder="enter a description" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Picture</label>
                          <input type="file" name="file" class="form-control">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" name="addGallery">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Picture</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Picture</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    $ambilsemuadatagallery = mysqli_query($conn, "SELECT * FROM gallery");

                    $i = 1;
                    while ($data = mysqli_fetch_array($ambilsemuadatagallery)) {
                      $name = $data['name'];
                      $iduser = $data['iduser'];
                      $description = $data['description'];
                      $picture = $data['picture'];

                      $picture = $data['picture'];
                      if ($picture == null) {
                        $picture = 'No Photo';
                      } else {
                        $picture = '<img src="images/' . $picture . '" class="zoomable">';
                      }

                    ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $name; ?></td>
                        <td><?= $description; ?></td>
                        <td><?= $picture; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $iduser; ?>">Edit</button>
                          <!-- Edit -->
                          <div class="modal fade" id="edit<?= $iduser; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form method="post" action="gallery.php">
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Gallery</h4>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                  </div>
                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <div class="mb-3">
                                      <label class="form-label">Name</label>
                                      <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="enter name" required>
                                    </div>
                                    <div class="mb-3">
                                      <label class="form-label">Description</label>
                                      <input type="text" name="description" value="<?= $description; ?>" class="form-control" placeholder="enter a description">
                                    </div>
                                    <input type="hidden" name="id" value="<?= $iduser; ?>">
                                    <div class="mb-3">
                                      <label class="form-label">Picture</label>
                                      <input type="file" name="file" class="form-control">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-warning" name="updateGallery">Submit</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $iduser; ?>">Delete</button>
                          <!-- Delete -->
                          <div class="modal fade" id="delete<?= $iduser; ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <form method="post" action="gallery.php">
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Delete Gallery</h4>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> -->
                                  </div>
                                  <!-- Modal Body -->
                                  <div class="modal-body">

                                    Are you sure you want to delete <?= htmlspecialchars($name); ?>?
                                    <input type="hidden" name="id" value="<?= $iduser; ?>">
                                  </div>
                                  <!-- Modal Footer -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger" name="hapusGallery">Delete</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php }; ?>
                  </tbody>
                </table>
              </div>
              </tr>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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