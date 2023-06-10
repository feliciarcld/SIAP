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
            $tgl_surat = $row[2];
            $tgl_terima = $row[3];
            $nomor = $row[4];
            $asal = $row[5];
            $kepada = $row[6];
            $perihal = $row[7];
            $ket = $row[8];
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
    .card {
        width: 800px;
    }
</style>

<body>
    <div class="card m-auto">
        <h5 class="card-header text-center">Edit Surat</h5>
        <div class="card-body">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <input type="hidden" name="id" value=<?php echo $id ?>>
                <div class="row">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-3">
                        <select id="jenis" name="jenis" class="form-control">
                            <option value="masuk" <?php echo $select = ($jenis == 'masuk') ? 'selected' : '' ?>>masuk</option>
                            <option value="keluar" <?php echo $select = ($jenis == 'keluar') ? 'selected' : ''; ?>>keluar</option>
                        </select><br>
                    </div>
                </div>
                <div class="row">
                    <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-3">
                        <input type="date" name="tgl_surat" class="form-control" value="<?php echo $tgl_surat; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="tgl_terima" class="col-sm-3 col-form-label">Tanggal Terima</label>
                    <div class="col-sm-3">
                        <input type="date" name="tgl_terima" class="form-control" value="<?php echo $tgl_terima; ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="nomor" class="col-sm-3 col-form-label">Nomor Surat</label>
                    <div class="col-sm-9">
                        <input type="text" name="nomor" class="form-control" value="<?php echo $nomor ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="asal" class="col-sm-3 col-form-label">Asal Surat</label>
                    <div class="col-sm-9">
                        <input type="text" name="asal" class="form-control" value="<?php echo $asal ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
                    <div class="col-sm-9">
                        <input type="text" name="kepada" class="form-control" value="<?php echo $kepada ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                        <input type="text" name="perihal" class="form-control" value="<?php echo $perihal ?>"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" name="ket" class="form-control" value="<?php echo $ket ?>"><br>
                    </div>
                </div>
                <a class="btn btn-secondary" href="<?php echo 'surat_' . $jenis . '.php' ?>">Batal</a>
                <input class="btn btn-primary" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $tgl_surat = $_POST['tgl_surat'];
    $tgl_terima = $_POST['tgl_terima'];
    $nomor = $_POST['nomor'];
    $asal = $_POST['asal'];
    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $ket = $_POST['ket'];

    $update = $db_koneksi->query("UPDATE surat SET jenis='$jenis',tgl_surat='$tgl_surat',tgl_terima='$tgl_terima',nomor='$nomor',asal='$asal',kepada='$kepada',perihal='$perihal',ket='$ket' WHERE id = $id");

    if (mysqli_affected_rows($db_koneksi) > 0) {
        echo '<script type="text/javascript">alert("Data berhasil diupdate!");document.location = "surat_' . $jenis . '.php";</script>';
    } else {
        echo "Data gagal diupdate!";
    }
}

$db_koneksi->close();
?>