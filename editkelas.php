<?php
include 'koneksi.php';
if (isset($_POST["submit"])) {
    $id_kelas = $_GET['id_kelas'];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"]; // Perubahan disini

    // Query untuk melakukan update data kelas
    $update = mysqli_query($mysqli, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");

    if ($update) {
        echo '<script>alert("Berhasil edit pembayaran"); window.location.href = "tabelkelas.php";</script>';
    } else {
        echo '<script>alert("gagal edit pembayaran");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.  googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <title>kelas</title>
</head>

<body>
    <nav class="navbar bg-primary">
        <a class="navbar-brand text-light text-center fw-bold">edit kelas</a>
    </nav>
    <?php
    include 'koneksi.php';

    // Pastikan id_kelas dikirimkan melalui URL
    if (isset($_GET["id_kelas"])) {
        $id_kelas = $_GET["id_kelas"];

        // Lakukan query untuk mengambil data kelas dengan id_kelas yang sesuai
        $update = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");

        // Pastikan Anda menggunakan mysqli_fetch_assoc untuk mengambil satu baris data dari hasil query
        $row = mysqli_fetch_assoc($update);
    }
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="mt-4" action="" method="post">
                    <div class="form-group">
                        <label>ID kelas</label>
                        <!-- Gunakan input teks untuk mengedit ID kelas -->
                        <input type="text" class="form-control" name="id_kelas" value="<?php echo $row['id_kelas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama kelas</label>
                        <textarea class="form-control" name="nama_kelas" id="exampleFormControlTextarea1" rows="3"><?php echo $row['nama_kelas']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Kompetensi keahlian</label>
                        <textarea class="form-control" name="kompetensi_keahlian" id="exampleFormControlTextarea1" rows="3"><?php echo $row['kompetensi_keahlian']; ?></textarea>
                    </div>
                    <!-- Perbaikan: menghapus input yang tidak diperlukan -->
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"></script>

</body>

</html>