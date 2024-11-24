<?php

include '../database/koneksi.php';

$selectpengguna = mysqli_query($koneksi, "SELECT * FROM user ORDER BY id DESC");

// untuk mendelete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");
}

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<?php include '../layout/head.php' ?>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include '../layout/sidebar.php' ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include '../layout/navbar.php' ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <!-- / Content -->
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div>
                                    <a href="tambah-user.php" class="btn btn-outline-primary">Tambah</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="text-center">
                                            <tr>
                                                <th>No.</th>
                                                <th>Level pengguna</th>
                                                <th>Nama pengguna</th>
                                                <th>Email Pengguan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            while ($rowpengguna = mysqli_fetch_assoc($selectpengguna)) { ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $rowpengguna['nama_level'] ?></td>
                                                    <td><?php echo $rowpengguna['nama_lengkap'] ?></td>
                                                    <td><?php echo $rowpengguna['email'] ?></td>
                                                    <td>
                                                        <a href="tambah-user.php?edit=<?php echo $rowpengguna['id'] ?>" class="btn btn-success btn-sm">
                                                            <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                        </a>
                                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data ini??')"
                                                            href="user.php?delete=<?php echo $rowpengguna['id'] ?>" class="btn btn-danger btn-sm">
                                                            <span class="tf-icon bx bx-trash bx-18px "></span>
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>

                    <!-- Footer -->
                    <?php include '../layout/footer.php' ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
        <a
            href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
            target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    <?php include '../layout/js.php' ?>
</body>

</html>