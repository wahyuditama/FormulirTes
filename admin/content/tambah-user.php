<?php
include '../database/koneksi.php';
session_start();

// Select Data dari Table Level
$queryLevel = mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");

if (isset($_POST['tambah'])) {
    $id_level = $_POST['id_level'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($koneksi, "INSERT INTO user (id_level, nama_lengkap, email, password) VALUES ('$id_level','$nama_lengkap','$email','$password')");

    header('location: data-pengguna.php?tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM user WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

if (isset($_POST['edit'])) {
    $id_level = $_POST['id_level'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ambil nama level dari table level
    // $sqlLevel = mysqli_query($koneksi, "SELECT * FROM level WHERE id= '$id_level'");
    // $result = mysqli_fetch_array($sqlLevel);
    // $nama_level = $result['nama_level'];

    // update data pengguna di table user
    $update = mysqli_query($koneksi, "UPDATE user SET id_level='$id_level', nama_lengkap='$nama_lengkap', email='$email', password='$password' WHERE id='$id'");

    // print_r($update);
    // die();
    header('location: data-pengguna.php?edit=berhasil');
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
                                    <div class="card-header d-flex justify-content-between">
                                        <h4><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> user</h4>
                                        <a href="" class="btn btn-secondary" onclick="window.history.back();return false;"><i class='bx bx-left-arrow-alt'></i></a>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Level user</label>
                                                        <select data-mdb-select-init name="id_level" class="form-control">
                                                            <option value="">Pilih Level</option>
                                                            <?php while ($rowLevel = mysqli_fetch_assoc($queryLevel)) { ?>
                                                                <option <?php echo isset($rowEdit['id_level']) ? ($rowLevel['id'] == $rowEdit['id_level']) ? 'selected' : '' : '' ?>
                                                                    value="<?php echo $rowLevel['id'] ?>"><?php echo $rowLevel['nama_level'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Nama user</label>
                                                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Email user</label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for=""><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Password user</label>
                                                        <input type="password" name="password" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
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