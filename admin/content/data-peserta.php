<?php

include '../database/koneksi.php';
include '../layout/helper.php';
session_start();

$dataPeserta = mysqli_query($koneksi, "SELECT 
    gelombang_pelatihan.nama_gelombang,
    jurusan.nama_jurusan, 
    peserta_pelatihan.* 
FROM 
    peserta_pelatihan 
LEFT JOIN 
    gelombang_pelatihan ON peserta_pelatihan.id_gelombang = gelombang_pelatihan.id
LEFT JOIN 
    jurusan ON peserta_pelatihan.id_jurusan = jurusan.id
ORDER BY 
    peserta_pelatihan.id DESC
");

// Parameter untuk ubah status
$id = isset($_GET['id']) ? $_GET['id'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

if (isset($id) || isset($status)) {
    $query = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET status = '$status' WHERE id = '$id'");
}

// untuk mendelete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM peserta_pelatihan WHERE id='$id'");
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <?php if ($_SESSION['level'] == 1) : ?>
                                            <a href="tambah-data-peserta.php?tambah" class="btn btn-outline-primary mb-3">Tambah</a>
                                        <?php endif ?>
                                        <?php if ($_SESSION['level'] == 2) : ?>
                                            <h3>Data Peserta Pelatihan</h3>
                                        <?php endif ?>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Gelombang Pelatihan</th>
                                                        <th>Jurusan</th>
                                                        <th>Nama Peserta</th>
                                                        <th>Email</th>
                                                        <!-- <th>Foto Kartu Keluarga</th> -->
                                                        <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) : ?>
                                                            <th>Status</th>
                                                        <?php endif ?>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    while ($rowPeserta = mysqli_fetch_assoc($dataPeserta)) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $rowPeserta['nama_gelombang'] ?></td>
                                                            <td><?php echo $rowPeserta['nama_jurusan'] ?></td>
                                                            <td><?php echo $rowPeserta['nama_lengkap'] ?></td>
                                                            <td><?php echo $rowPeserta['email'] ?></td>
                                                            <!-- <td>
                                                                <img src="../upload/<?php echo $rowPeserta['kartu_keluarga'] ?>" class="img-fluid" width="100" alt="">
                                                            </td> -->
                                                            <?php if ($_SESSION['level'] == 1 ||  $_SESSION['level'] == 2) : ?>
                                                                <td>
                                                                    <?php
                                                                    switch ($rowPeserta['status']) {
                                                                        case '1':
                                                                            $badge = "<a href='data-peserta.php?id=" . $rowPeserta['id'] . "&status=0' class='btn btn-success btn-sm'>Lulus</a>";
                                                                            break;
                                                                        default:
                                                                            $badge = "<a href='data-peserta.php?id=" . $rowPeserta['id'] . "&status=1' class='btn btn-danger btn-sm'>Belum Lulus</a>";
                                                                            break;
                                                                    }
                                                                    echo $badge;
                                                                    ?>
                                                                </td>
                                                            <?php endif ?>
                                                            <td>
                                                                <?php if ($_SESSION['level'] == 2 || $_SESSION['level'] == 3) : ?>
                                                                    <a href="tambah-data-peserta.php?detail=<?php echo $rowPeserta['id'] ?>" class="btn btn-primary btn-sm">
                                                                        <span class="tf-icon bx bx-show bx-18px "></span>
                                                                    </a>
                                                                <?php endif ?>
                                                                <?php if ($_SESSION['level'] == 1) : ?>
                                                                    <a href="tambah-data-peserta.php?edit=<?php echo $rowPeserta['id'] ?>" class="btn btn-success btn-sm">
                                                                        <span class="tf-icon bx bx-pencil bx-18px "></span>
                                                                    </a>
                                                                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini??')"
                                                                        href="data-peserta.php?delete=<?php echo $rowPeserta['id'] ?>" class="btn btn-danger btn-sm">
                                                                        <span class="tf-icon bx bx-trash bx-18px "></span>
                                                                    </a>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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