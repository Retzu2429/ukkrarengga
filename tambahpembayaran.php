<?php
session_start(); // Mulai sesi

include 'koneksi.php';

if (isset($_POST["submit"])) {
  // Pastikan session id petugas telah diatur
  if (isset($_SESSION['id_petugas'])) {
    $id_petugas = $_SESSION['id_petugas']; // Ambil id_petugas dari session
    $NIS = $_POST["NIS"];
    $tgl_bayar = $_POST["tgl_bayar"];
    $jumlah_bayar = $_POST["jumlah_bayar"];

    // Query SQL untuk menambahkan data ke tabel pembayaran
    $sql = "INSERT INTO pembayaran (id_petugas, NIS, tgl_bayar, jumlah_bayar) 
                VALUES ('$id_petugas', '$NIS', '$tgl_bayar', '$jumlah_bayar')";

    if (mysqli_query($mysqli, $sql)) {
      echo '<script>alert("Berhasil Menambahkan"); window.location.href = "tabelpembayaran.php";</script>';
    } else {
      echo '<script>alert("Gagal Menambahkan");</script>';
    }
  } else {
    // Tindakan jika session id petugas tidak diatur
    echo "Anda tidak memiliki izin untuk mengakses halaman ini.";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Pembayaran</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5 ">
    <h2 class="mb-4">Tabel Tambah Pembayaran</h2>
    <form action="" method="POST" class="mb-3 ">

      <div class="card-row ">
        <!-- <div class="form-group col-md-3">
          <input type="text" class="form-control" placeholder="ID Pembayaran" name="id_pembayaran">
        </div> -->
        <?php
        // Lakukan query untuk mendapatkan daftar siswa
        $query_siswa = mysqli_query($mysqli, "SELECT * FROM siswa");

        // Inisialisasi variabel untuk menyimpan opsi siswa
        $siswa_options = '';

        // Periksa apakah query berhasil dieksekusi
        if ($query_siswa) {
          // Lakukan loop untuk setiap baris hasil query
          while ($row_siswa = mysqli_fetch_assoc($query_siswa)) {
            // Tambahkan opsi ke dalam variabel siswa_options
            $siswa_options .= "<option value='" . $row_siswa['NIS'] . "'>" . $row_siswa['NIS'] . " - " . $row_siswa['Nama'] . "</option>";
          }
        } else {
          // Tampilkan pesan kesalahan jika query gagal dieksekusi
          echo "Error: " . mysqli_error($mysqli);
        }
        ?>

        <!-- Kemudian di bagian HTML -->
        <div class="form-group col-md-3">
          <select class="form-control" name="NIS">
            <option value="">Pilih NIS</option>
            <?php echo $siswa_options; ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <input type="date" class="form-control" placeholder="Tanggal Pembayaran" name="tgl_bayar">
        </div>
        <div class="form-group col-md-3">
          <input type="number" class="form-control" placeholder="Jumlah Bayar" name="jumlah_bayar">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
    </form>

    <table class="table">
      <!-- Tabel data -->
    </table>
  </div>
</body>

</html>