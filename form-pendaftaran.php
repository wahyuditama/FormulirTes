<?php
include 'admin/database/koneksi.php';

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
            move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], 'admin/upload/' . $kartu);
            $queryPelatihan = mysqli_query($koneksi, " INSERT INTO peserta_pelatihan (nama_lengkap, id_gelombang, id_jurusan, gelombang, jurusan,tanggal_lahir,tempat_lahir, jenis_kelamin, email,kartu_keluarga) SELECT '$nama_lengkap', '$id_gelombang','$id_jurusan', gelombang_pelatihan.nama_gelombang, jurusan.nama_jurusan,'$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$email','$kartu' FROM gelombang_pelatihan JOIN jurusan ON gelombang_pelatihan.id = '$id_gelombang' AND jurusan.id = '$id_jurusan'");
        }
    } else {
        $queryPelatihan = mysqli_query($koneksi, " INSERT INTO peserta_pelatihan (nama_lengkap, id_gelombang, id_jurusan, gelombang, jurusan,tanggal_lahir,tempat_lahir, jenis_kelamin, email) SELECT '$nama_lengkap','$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$email', gelombang_pelatihan.id, jurusan.id, gelombang_pelatihan.nama_gelombang,jurusan.nama_jurusan FROM gelombang_pelatihan JOIN jurusan ON gelombang_pelatihan.id = '$id_gelombang' AND jurusan.id = '$id_jurusan'");
    }
    echo "Data berhasil masuk";
}

// selecrt Gelombang
$queryGelombang = mysqli_query($koneksi, "SELECT * FROM gelombang_pelatihan ORDER BY id DESC");

// Select Jurusan
$queryJurusan = mysqli_query($koneksi, "SELECT * FROM jurusan ORDER BY id DESC");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg shadow p-3 bg-body-tertiary rounded">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active bg-outline-primary fw-bold text-shadow" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active btn-outline-primary fw-bold text-shadow" aria-current="page" href="admin/content/login.php">Login admin</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- end-navbar -->
    <!-- content -->
    <div class="container mt-3">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="card-header mx-auto d-flex justify-content-center">
                        <img src="admin/assets/img/backgrounds/download.png" class="my-2" width="60" height="auto" alt="">
                        <h1 class="mx-3 my-2">Form Pendaftaran</h1>
                        <img src="admin/assets/img/backgrounds/download.png" class="my-2" width="60" height="auto" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card p-4 m-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Gelombang Pelatihan</label>
                                        <select name="gelombang" id="gelombang" class="form-select form-label">
                                            <option value="">Pilih Gelombang Pelatihan</option>
                                            <?php while ($rowPelatihan = mysqli_fetch_assoc($queryGelombang)) { ?>
                                                <option value="<?php echo $rowPelatihan['id'] ?>"> <?php echo $rowPelatihan['nama_gelombang'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">jurusan Pelatihan</label>
                                        <select name="jurusan" id="jurusan" class="form-select form-label">
                                            <option value="">Pilih jurusan Pelatihan</option>
                                            <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                                                <option value="<?php echo $rowJurusan['id'] ?>"> <?php echo $rowJurusan['nama_jurusan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Masukan Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Tempat Lahir </label>
                                        <input type="text" name="tempat_lahir" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" class="form-control">
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
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Kartu Keluarga</label>
                                        <input type="file" name="kartu_keluarga" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="bg-primary text-white" name="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>