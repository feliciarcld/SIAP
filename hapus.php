<?php
include('header.php');
include('database.php');

if (isset($_GET['id'])) {
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $data = $db_koneksi->query("SELECT * FROM surat WHERE id = $id");
        if (mysqli_num_rows($data) > 0) {
            $row = $data->fetch_row();
            $jenis = $row[1];
            $nomor = $row[4];
        } else {
            echo "Data tidak ditemukan!";
            exit;
        }
    } else {
        header("Location: dashboard.php");
    }
} else {
    header("Location: dashboard.php");
}

?>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .card {
        width: 800px;
    }
</style>

<body class="text-center">
    <div class="card m-auto">
        <h5 class="card-header text-center">Hapus Surat</h5>
        <div class="card-body">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <input type='text' name="id" value="<?php echo $id ?>" hidden>
                <input type='text' name="jenis" value="<?php echo $jenis ?>" hidden>
                <p>Apakah anda yakin ingin menghapus surat ini ?</p>
                <h1><?php echo $nomor ?></h1><br>
                <a class="btn btn-secondary" href="<?php echo 'surat_' . $jenis . '.php' ?>">Batal</a>
                <input class="btn btn-danger" type="submit" name="submit" value="Hapus">
            </form>
        </div>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];

    $delete = $db_koneksi->query("DELETE FROM surat WHERE id = $id");

    if (mysqli_affected_rows($db_koneksi) > 0) {
        echo '<script type="text/javascript">alert("Data berhasil dihapus!");document.location = "surat_' . $jenis . '.php";</script>';
    } else {
        echo "Data gagal dihapus!";
    }
}

$db_koneksi->close();
?>