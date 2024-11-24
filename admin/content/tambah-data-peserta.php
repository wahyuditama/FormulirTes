<?php
include '../database/koneksi.php';

if (isset($_POST['submit'])) {
    $id_gelombang = $_POST['gelombang'];
    $id_jurusan = $_POST['jurusan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    if (!empty($_FILES['kartu_keluarga']['name'])) {
        $kartu = $_FILES['kartu_keluarga']['name'];
        $sizeKartu = $_FILES['kartu_keluarga']['size'];

        $ext = array('PNG', 'JPEG', 'JPG');
        $extKartu = pathinfo($kartu, PATHINFO_EXTENSION);

        if (in_array($extKartu, $ext)) {
            echo "extension tidak ditemukan";
            die();
        } else {
            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], '../upload' . $kartu);
            $queryPelatihan = mysqli_query($koneksi, " INSERT INTO peserta_pelatihan (nama_lengkap, id_gelombang, id_jurusan, gelombang, jurusan,tanggal_lahir,tempat_lahir, jenis_kelamin, email,kartu_keluarga) SELECT '$nama_lengkap', '$id_gelombang','$id_jurusan', gelombang_pelatihan.nama_gelombang, jurusan.nama_jurusan,'$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$email','$kartu' FROM gelombang_pelatihan JOIN jurusan ON gelombang_pelatihan.id = '$id_gelombang' AND jurusan.id = '$id_jurusan'");
        }
    } else {
        $queryPelatihan = mysqli_query($koneksi, " INSERT INTO peserta_pelatihan (nama_lengkap, id_gelombang, id_jurusan, gelombang, jurusan,tanggal_lahir,tempat_lahir, jenis_kelamin, email) SELECT '$nama_lengkap','$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$email', gelombang_pelatihan.id, jurusan.id, gelombang_pelatihan.nama_gelombang,jurusan.nama_jurusan FROM gelombang_pelatihan JOIN jurusan ON gelombang_pelatihan.id = '$id_gelombang' AND jurusan.id = '$id_jurusan'");
    }
    header('location : data-peserta.php?tambah=berhasil');
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, 'SELECT * FROM peserta_pelatihan ORDER BY id DESC');
$rowEdit = mysqli_fetch_assoc($queryEdit);


if (isset($_POST['edit'])) {
    $id_gelombang = $_POST['gelombang'];
    $id_jurusan = $_POST['jurusan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $email = $_POST['email'];

    //Ambil Data Gelombang 
    $queryEditGelombang = mysqli_query($koneksi, "SELECT * FROM gelombang_pelatihan WHERE id = '$id_gelombang");
    $rowGelombang = mysqli_fetch_assoc($queryEditGelombang);
    $nama_gelombang = $rowGelombang['gelombang'];
    // Ambil Data Jurusan
    $queryEditJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan WHERE id = '$id_jurusan");
    $rowJurusan = mysqli_fetch_assoc($queryEditJurusan);
    $nama_jurusan = $rowJurusan['jurusan'];
    // update data peserta pelatihan di table Peserta Pelatihan
    if (!empty($_FILES['kartu_keluarga']['name'])) {
        $kartu = $_FILES['kartu_keluarga']['name'];
        $sizeKartu = $_FILES['kartu_keluarga']['size'];

        $ext = array('PNG', 'JPEG', 'JPG');
        $extKartu = pathinfo($kartu, PATHINFO_EXTENSION);

        if (in_array($extKartu, $ext)) {
            echo "extension tidak ditemukan";
            die();
        } else {
            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], '../upload' . $kartu);
            $queryEdit = mysqli_query($koneksi, "UPDATE peserta_pelatihan SET 
            nama_lengkap = '$nama_lengkap', 
            id_gelombang = '$id_gelombang', 
            id_jurusan = '$id_jurusan', 
            gelombang = '$nama_gelombang', 
            jurusan = '$nama_jurusan', 
            tanggal_lahir = '$tanggal_lahir', 
            tempat_lahir = '$tempat_lahir', 
            jenis_kelamin = '$jenis_kelamin', 
            email = '$email', 
            kartu_keluarga = '$kartu' 
            WHERE id = '$id'");
        }
    }

    header('location: data-peserta.php?edit=berhasil');
}


// selecrt Gelombang
$queryGelombang = mysqli_query($koneksi, "SELECT * FROM gelombang_pelatihan ORDER BY id DESC");

// Select Jurusan
$queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id DESC");
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
                            <div class="col-md-10 mx-auto">
                                <div class="card">
                                    <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : (isset($_GET['detail']) ? 'Detail' : 'Tambah'); ?> Data Peserta</div>
                                    <div class="card-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Gelombang Pelatihan</label>
                                                        <?php if (isset($_GET['tambah']) || isset($_GET['edit'])) : ?>
                                                            <select name="gelombang" id="gelombang" class="form-select form-label">
                                                                <option value="">Pilih Gelombang Pelatihan</option>
                                                                <?php while ($rowPelatihan = mysqli_fetch_assoc($queryGelombang)) { ?>
                                                                    <option value="<?php echo $rowPelatihan['id'] ?>"> <?php echo $rowPelatihan['nama_gelombang'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php endif; ?>
                                                        <?php if (isset($_GET['detail'])) : ?>
                                                            <input type="text" class="form-control" value="<?php echo isset($_GET['detail']) ? $rowEdit['gelombang'] : '' ?>" readonly>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">jurusan Pelatihan</label>
                                                        <?php if (isset($_GET['tambah']) || isset($_GET['edit'])) : ?>
                                                            <select name="jurusan" id="jurusan" class="form-select form-label">
                                                                <option value="">Pilih jurusan Pelatihan</option>
                                                                <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                                                    <option value="<?php echo $rowJurusan['id'] ?>"> <?php echo $rowJurusan['nama_jurusan'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        <?php endif; ?>
                                                        <?php if (isset($_GET['detail'])) : ?>
                                                            <input type="text" class="form-control" value="<?php echo $rowEdit['jurusan'] ?>">
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Masukan Nama Lengkap</label>
                                                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_lengkap'] : '' ?>" <?php echo isset($_GET['detail']) ? 'readonly' : ''; ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Tempat Lahir </label>
                                                        <input type="text" name="tempat_lahir" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['tempat_lahir'] : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Tanggal Lahir</label>
                                                        <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['tanggal_lahir'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">jenis_kelamin Pelatihan</label>
                                                        <select name="jenis_kelamin" id="" class="form-control">
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Laki-Laki">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Email</label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Kartu Keluarga</label><br>
                                                        <input type="file" name="kartu_keluarga" class="form-control" value="<?php echo isset($_GET['edit']) ? $rowEdit['kartu_keluarga'] : '' ?>">
                                                        <img class="img-fluid w-50 mt-3" src="../upload/<?php echo isset($_GET['edit']) ? $rowEdit['kartu_keluarga'] : '' ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if (!isset($_GET['detail'])): ?>
                                                <button type="submit" class="bg-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'submit' ?>"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?></button>
                                            <?php endif; ?>
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

    <div class="buy-now">
        <a
            href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
            target="_blank"
            class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
    </div>

    <?php include '../layout/js.php' ?>
</body>

</html>