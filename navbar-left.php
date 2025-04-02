<ul
    class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->

        </div>
        <img src="img/icon-geraipajak.png" width="55" height="55">
        <div class="sidebar-brand-text mx-3">Gerai <sup>Admin</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($current_page == 'index.php') ? 'active' : '' ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Blog -->
    <li class="nav-item <?= ($current_page == 'blog.php') ? 'active' : '' ?>">
        <a class="nav-link" href="blog.php">
            <i class="fas fa-blog"></i>
            <span>Blog</span></a>
    </li>

    <!-- Nav Item - Category -->
    <li class="nav-item <?= ($current_page == 'category.php') ? 'active' : '' ?>">
        <a class="nav-link" href="category.php">
            <i class="fa fa-window-restore"></i>
            <span>Category</span></a>
    </li>

    <!-- Nav Item - Galerry -->
    <li class="nav-item <?= ($current_page == 'gallery.php') ? 'active' : '' ?>">
        <a class="nav-link" href="gallery.php">
            <i class="fas fa-image"></i>
            <span>Gallery</span></a>
    </li>

    <!-- Nav Item - User -->
    <li class="nav-item <?= ($current_page == 'users.php') ? 'active' : '' ?>">
        <a class="nav-link" href="users.php">
            <i class="fas fa-user"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Logout -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg>
            <span>Logout</span></a>
    </li> -->

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>