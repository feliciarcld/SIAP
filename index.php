<?php
include('database.php');
session_start();
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

        .form-signin {
            max-width: 500px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="text"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">
    <main class="form-signin m-auto">
        <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <img src="logo.png" width="85">
            <h5>Sistem Informasi Arsip Persuratan (SIAP)</h5>
            <h5>KPU Kota Bogor</h5>
            <br>

            <div class="form-floating">
                <input type="text" name="nip" class="form-control" id="floatingInput" placeholder="1234567890">
                <label for="floatingInput">NIP</label>
            </div>
            <div class="form-floating">
                <input type="password" name="katasandi" class="form-control" id="floatingPassword" placeholder="Kata sandi">
                <label for="floatingPassword">Kata sandi</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Masuk</button>
        </form>
        <p class="my-3">Belum punya akun? <a href="daftar.php">Daftar disini</a></p>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2023 KPU Kota Bogor</p>
    </main>

</body>


</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST["nip"];
    $katasandi = $_POST["katasandi"];

    if (empty($nip)) {
        echo "Kolom NIP tidak boleh kosong!";
    } elseif (empty($katasandi)) {
        echo "Kolom Katasandi tidak boleh kosong!";
    } else {
        $sql = "SELECT * FROM pengguna WHERE nip = '$nip'";
        $result = mysqli_query($db_koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($katasandi, $row['password'])) {
                $_SESSION["nip"] = $nip;
                header("Location: dashboard.php");
            } else {
                echo '<script type="text/javascript">alert("NIP/Kata sandi salah!")</script>';
            }
        } else {
            echo '<script type="text/javascript">alert("NIP tidak ditemukan!")</script>';
        }
    }
}

$db_koneksi->close();
?>