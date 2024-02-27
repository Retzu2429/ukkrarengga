<?php
// Mengecek apakah tombol logout diklik
if (isset($_GET['logout'])) {
  // Menghapus semua variabel sesi
  session_start();
  session_unset();
  session_destroy();
  // Mengarahkan pengguna ke halaman login
  header("Location: login.php");
  exit;
}

include 'koneksi.php';

// Proses pencarian
if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $query = "SELECT * FROM siswa WHERE NIS LIKE '%$keyword%' OR Nama LIKE '%$keyword%' OR id_kelas LIKE '%$keyword%'";
} else {
  $query = "SELECT * FROM siswa";
}

$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Siswa</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <a href="tabelkelas.php" class="btn btn-info mb-2">Tabel Kelas</a> <!-- Tambahkan tombol "Tabel Pembayaran" di sini -->
    <a href="tabelsiswa.php" class="btn btn-info mb-2">Tabel Siswa</a> <!-- Tambahkan tombol "Tabel Siswa" di sini -->
    <a href="tabelpembayaran.php" class="btn btn-info mb-2">Tabel Pembayaran</a> <!-- Tambahkan tombol "Tabel Pembayaran" di sini -->

    <h2 class="mb-4">Tabel siswa</h2>
    <form action="" method="GET" class="mb-3">
      <a href="tambahsiswa.php" class="btn btn-success mb-3">Tambah Data</a> <!-- Tambahkan tombol "Tambah Data" di sini -->
      <a href="tabelsiswa.php" class="btn btn-warning mb-3">tampilkan semua</a>
      <!-- Tambahkan tombol "Log Out" -->
      <a href="?logout" class="btn btn-danger mb-3">Log Out</a>

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari..." name="search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th>NIS</th>
          <th>Nama</th>
          <th>ID Kelas</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['NIS'] . "</td>";
          echo "<td>" . $row['Nama'] . "</td>";
          echo "<td>" . $row['id_kelas'] . "</td>";
          echo "<td>";
          echo '<a href="editsiswa.php?NIS=' . $row['NIS'] . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>';
          echo '<a href="hapussiswa.php?NIS=' . $row['NIS'] . '" class="remove btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>';
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>