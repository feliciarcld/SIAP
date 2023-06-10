<?php
include('database.php');
session_start();

if (!empty($_SESSION["nip"])) {
    $nip = $_SESSION["nip"];
    $sql = "SELECT * FROM pengguna WHERE nip = '$nip'";
    $result = mysqli_query($db_koneksi, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row["nama_lengkap"];
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

$halaman = str_replace(".php", "", explode('/', $_SERVER['REQUEST_URI'])[2]);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
</head>

<header class="pb-5 mb-3">
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <div class="d-flex align-items-center me-5 text-light">
                <div class="flex-shrink-0">
                    <img src="logo.png" width="42">
                </div>
                <div class="flex-grow-1 ms-2 fs-6 lh-1 text-start">
                    Komisi Pemilihan Umum Kota Bogor<br>
                    Sistem Informasi Arsip Persuratan
                </div>
            </div>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav nav-underline me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($halaman == 'dashboard' ? "active" : "") ?>" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($halaman == 'surat_masuk' ? "active" : "") ?>" href="surat_masuk.php">Surat Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($halaman == 'surat_keluar' ? "active" : "") ?>" href="surat_keluar.php">Surat Keluar</a>
                    </li>
                </ul>
                <span class="navbar-text mx-3">
                    Selamat datang, <?php echo $nama ?>
                </span>
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                    <input class="btn btn-light" type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </nav>
</header>



</html>
<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}

$db_koneksi->close();
?>