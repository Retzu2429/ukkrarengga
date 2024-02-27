<?php
include 'koneksi.php';

// Pastikan NIS dikirimkan melalui URL
if (isset($_GET["NIS"])) {
    $NIS = $_GET["NIS"];

    // Lakukan query untuk mengambil data siswa dengan NIS yang sesuai
    $result = mysqli_query($mysqli, "SELECT * FROM siswa WHERE NIS='$NIS'");

    // Pastikan query berhasil dieksekusi
    if ($result) {
        // Pastikan Anda menggunakan mysqli_fetch_assoc untuk mengambil satu baris data dari hasil query
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle jika query gagal dieksekusi
        echo "Error: " . mysqli_error($mysqli);
    }
} else {
    // Handle jika NIS tidak dikirimkan melalui URL
    echo "NIS tidak ditemukan dalam parameter URL.";
}

// Cek apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $nama = $_POST["Nama"];
    $id_kelas = $_POST["id_kelas"];

    // Lakukan query untuk memperbarui data siswa
    $query = mysqli_query($mysqli, "UPDATE siswa SET Nama='$nama', id_kelas='$id_kelas' WHERE NIS='$NIS'");

    // Pastikan query berhasil dieksekusi
    if ($query) {
        echo '<script>alert("Berhasil memperbarui data"); window.location.href = "tabelsiswa.php";</script>';
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary">
        <a class="navbar-brand text-light text-center fw-bold">edit siswa</a>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="mt-4" action="" method="post">
                    <?php if (isset($row)) { ?>
                        <div class="form-group">
                            <label>NIS</label>
                            <!-- Gunakan input teks untuk mengedit NIS -->
                            <input type="text" class="form-control" name="NIS" value="<?php echo $row['NIS']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <textarea class="form-control" name="Nama" rows="3"><?php echo $row['Nama']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>ID Kelas</label>
                            <textarea class="form-control" name="id_kelas" rows="3"><?php echo $row['id_kelas']; ?></textarea>
                        </div>
                        <!-- Perbaikan: menghapus input yang tidak diperlukan -->
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <?php } else { ?>
                        <p>Data siswa tidak ditemukan.</p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
