<?php
include '../database/koneksi.php';

if (isset($_POST['tambah'])) {
    $gelombang = $_POST['gelombang'];

    $sql = "INSERT INTO gelombang_pelatihan (nama_gelombang) VALUES ('$gelombang')";
    $result = mysqli_query($koneksi, $sql);

    header('location:gelombang.php?tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, 'SELECT * FROM gelombang_pelatihan ORDER BY id DESC');
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $gelombang = $_POST['gelombang'];

    $update = mysqli_query($koneksi, "UPDATE gelombang_pelatihan SET nama_gelombang='$gelombang' WHERE id='$id'");

    header('location: gelombang.php?edit=berhasil');
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
                                <div class="card">
                                    <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> gelombang</div>
                                    <div class="card-body">
                                        <form action="" method="Post">
                                            <label for=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Gelombang Disisni</label>
                                            <input type="text" name="gelombang" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_gelombang'] : '' ?>">
                                            <button type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'tambah' ?>" class="mt-3 bg-primary">Submit</button>
                                        </form>
                                    </div>
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

    <!-- <div class="buy-now">
        <a
            href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
            target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div> -->

    <?php include '../layout/js.php' ?>
</body>

</html>