<?php
include 'koneksi.php';
if (isset($_POST["submit"])) {
    $NIS = $_POST["NIS"];
    $Nama = $_POST["Nama"];
    $id_kelas = $_POST["id_kelas"];
    $insert = mysqli_query($mysqli, "INSERT INTO siswa (NIS, Nama, id_kelas) values('$NIS','$Nama','$id_kelas')");

    if ($insert) {
        echo '<script>alert("Berhasil menambah Siswa"); window.location.href = "tabelsiswa.php";</script>';
    } else {
        echo '<script>alert("gagal menambah Siswa");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 ">
        <h2 class="mb-4">Tabel Tambah siswa</h2>
        <form action="" method="POST" class="mb-3 ">
            <div class="card-row">
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" placeholder="NIS" name="NIS">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" placeholder="Nama" name="Nama">
                </div>
                <?php
                include 'koneksi.php';

                // Lakukan query untuk mendapatkan daftar kelas
                $query_kelas = mysqli_query($mysqli, "SELECT * FROM kelas");

                // Inisialisasi variabel untuk menyimpan opsi kelas
                $kelas_options = '';

                // Periksa apakah query berhasil dieksekusi
                if ($query_kelas) {
                    // Lakukan loop untuk setiap baris hasil query
                    while ($row_kelas = mysqli_fetch_assoc($query_kelas)) {
                        // Tambahkan opsi ke dalam variabel kelas_options
                        $kelas_options .= "<option value='" . $row_kelas['id_kelas'] . "'>" . $row_kelas['id_kelas'] . "</option>";
                    }
                } else {
                    // Tampilkan pesan kesalahan jika query gagal dieksekusi
                    echo "Error: " . mysqli_error($mysqli);
                }
                ?>

                <!-- Kemudian di bagian HTML -->
                <div class="form-group col-md-3">
                    <select class="form-control" name="id_kelas">
                        <option value="">Pilih Kelas</option>
                        <?php echo $kelas_options; ?>
                    </select>
                    <button name="submit" type="submit" class="btn btn-primary">Tambah Data</button>
                    <a href="tambahsiswa.php" type="submit" class="btn btn-warning">Reset</a>
                </div>

                </select>
            </div>
    </div>
    </form>
    <table class="table">
        <!-- Tabel data -->
    </table>
    </div>
</body>

</html>