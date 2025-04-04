<?php
session_start();
require 'check.php';
require 'function-blog.php';
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
          <h1 class="h3 mb-2 text-gray-800">Blog</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data All Post</h6>
            </div>
            <div class="card-body">
              <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalAdd">
                Add Blog
              </button>
              <div class="modal fade" id="modalAdd">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <form method="post" enctype="multipart/form-data">
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Add Blog</h4>
                      </div>
                      <!-- Modal body -->
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">Title</label>
                          <input type="text" name="title" class="form-control" placeholder="Input Name" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Category</label>
                          <br>
                          <select class="form-select" name="category" required>
                            <option selected>Select Category</option>
                            <?php
                            $ambilsemuadata = mysqli_query($conn, "SELECT * FROM categories");
                            while ($data = mysqli_fetch_array($ambilsemuadata)) {
                              $name = $data['name'];
                              $id = $data['id'];
                            ?>
                              <option value="<?= $id ?>"><?= $name ?></option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Media</label>
                          <input type="file" name="file" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Content</label>
                          <textarea name="content" rows="10" id="content" class="form-control" required></textarea>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success" name="addBlog">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Media</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Media</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $ambilsemuadatagallery = mysqli_query($conn, "SELECT p.id, p.title, p.content, p.media, p.created_at, p.category_id, c.name as category_name
                  FROM posts p
                  INNER JOIN categories c on c.id = p.category_id;");

                  $i = 1;
                  while ($data = mysqli_fetch_array($ambilsemuadatagallery)) {
                    $category_id = $data['category_id'];
                    $category_name = $data['category_name'];
                    $id = $data['id'];
                    $title = $data['title'];
                    $content = $data['content'];
                    $media = $data['media'];

                    $picture = $data['media'];
                    if ($picture == null) {
                      $picture = 'No Photo';
                    } else {
                      $picture = '<img src="images/' . $picture . '" class="zoomable">';
                    }

                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $category_name; ?></td>
                      <td><?= $title; ?></td>
                      <td><?= shortenText($content, 200); ?> <a href="#" data-bs-toggle="modal" data-bs-target="#edit<?= $id; ?>">Read More</a></td>
                      <td><?= $picture; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $id; ?>">Edit</button>
                        <div class="modal fade" id="edit<?= $id; ?>">
                          <!-- Edit Admin -->
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <form method="post" enctype="multipart/form-data">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Blog</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                  <input type="hidden" name="id" value="<?= $id; ?>">

                                  <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Input Name" value="<?= $title; ?>" required>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <br>
                                    <select class="form-select" name="category" required>
                                      <?php
                                      $ambilsemuadata = mysqli_query($conn, "SELECT * FROM categories");
                                      while ($data = mysqli_fetch_array($ambilsemuadata)) {
                                        $name = $data['name'];
                                        $id = $data['id'];
                                      ?>
                                        <option value="<?= $id ?>" <?= ($id == $category_id) ? 'selected' : '' ?>><?= $name ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Media</label>
                                    <div class="mb-3">
                                      <?= $picture; ?>
                                    </div>
                                    <input type="file" name="file" class="form-control">
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" rows="10" id="content" class="form-control" required><?= $content; ?></textarea>
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success" name="updateBlog">Submit</button>
                                  </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- delete -->
                        <!-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?= $id; ?>">Delete</button>
                        <div class="modal fade" id="delete<?= $id; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <form method="post" action="">
                                <div class="modal-body">
                                  Are you sure you want to delete "<strong><?= htmlspecialchars($title); ?></strong>"?
                                  <input type="hidden" name="id" value="<?= $id; ?>">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="btn btn-danger" name="hapusBlog">Delete</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div> -->
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