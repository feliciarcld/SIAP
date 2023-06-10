<?php
include('header.php');
include('database.php');
?>

<style>
    .card {
        width: 800px;
    }
</style>

<body>
    <div class="card m-auto">
        <h5 class="card-header text-center">Tambah Surat</h5>
        <div class="card-body">
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
                <div class="row">
                    <label for="jenis" class="col-sm-3 col-form-label">Jenis Surat</label>
                    <div class="col-sm-3">
                        <select id="jenis" name="jenis" class="form-control">
                            <option value="masuk">masuk</option>
                            <option value="keluar">keluar</option>
                        </select><br>
                    </div>
                </div>
                <div class="row">
                    <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                    <div class="col-sm-3">
                        <input type="date" name="tgl_surat" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="tgl_terima" class="col-sm-3 col-form-label">Tanggal Terima</label>
                    <div class="col-sm-3">
                        <input type="date" name="tgl_terima" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="nomor" class="col-sm-3 col-form-label">Nomor Surat</label>
                    <div class="col-sm-9">
                        <input type="text" name="nomor" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="asal" class="col-sm-3 col-form-label">Asal Surat</label>
                    <div class="col-sm-9">
                        <input type="text" name="asal" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="kepada" class="col-sm-3 col-form-label">Kepada</label>
                    <div class="col-sm-9">
                        <input type="text" name="kepada" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                    <div class="col-sm-9">
                        <input type="text" name="perihal" class="form-control"><br>
                    </div>
                </div>
                <div class="row">
                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" name="ket" class="form-control"><br>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Tambah">
            </form>
        </div>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST['jenis'];
    $tgl_surat = $_POST['tgl_surat'];
    $tgl_terima = $_POST['tgl_terima'];
    $nomor = $_POST['nomor'];
    $asal = $_POST['asal'];
    $kepada = $_POST['kepada'];
    $perihal = $_POST['perihal'];
    $ket = $_POST['ket'];

    $insert = $db_koneksi->query("INSERT INTO surat (jenis, tgl_surat, tgl_terima, nomor, asal, kepada, perihal, ket) VALUES ('$jenis','$tgl_surat','$tgl_terima','$nomor','$asal','$kepada','$perihal','$ket')");

    if (mysqli_affected_rows($db_koneksi) > 0) {
        echo '<script type="text/javascript">alert("Data berhasil ditambahkan!");document.location = "surat_' . $jenis . '.php";</script>';
    } else {
        echo '<script type="text/javascript">alert("Maaf! NIP sudah pernah didaftarkan!")</script>';
    }
}

$db_koneksi->close();
?>