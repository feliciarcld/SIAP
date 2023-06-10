<?php
$db_server = "localhost";
$db_pengguna = "root";
$db_katasandi = "";
$db = "db_siap";

try {
    $db_koneksi = new mysqli($db_server, $db_pengguna, $db_katasandi, $db);
} catch (mysqli_sql_exception) {
    echo "Koneksi ke database gagal!";
}
