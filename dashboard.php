<?php
include('header.php');
include('database.php');

$jml_surat_masuk = $db_koneksi->query("SELECT COUNT(*) FROM surat WHERE jenis = 'masuk'")->fetch_row()[0];
$jml_surat_keluar = $db_koneksi->query("SELECT COUNT(*) FROM surat WHERE jenis = 'keluar'")->fetch_row()[0];
$total_surat = $jml_surat_masuk + $jml_surat_keluar;

?>

<body class="text-center m-auto">
    <div class="card m-2">
        <h5 class="card-header">Dashboard</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Jumlah Surat Masuk
                        </div>
                        <div class="card-body">
                            <h1><?php echo $jml_surat_masuk ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Jumlah Surat Keluar
                        </div>
                        <div class="card-body">
                            <h1><?php echo $jml_surat_keluar ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card text-center">
                        <div class="card-header">
                            Total Surat
                        </div>
                        <div class="card-body">
                            <h1><?php echo $total_surat ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
$db_koneksi->close();
?>