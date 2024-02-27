<?php
include 'koneksi.php';

// Proses pencarian
if (isset($_GET['search'])) {
  $keyword = $_GET['search'];
  $query = "SELECT * FROM pembayaran WHERE id_pembayaran LIKE '%$keyword%' OR id_petugas LIKE '%$keyword%' OR NIS LIKE '%$keyword%' OR tgl_bayar LIKE '%$keyword%' OR jumlah_bayar LIKE '%$keyword%'";
} else {
  $query = "SELECT * FROM pembayaran";
}

$result = mysqli_query($mysqli, $query);
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
  <div class="container mt-5">
    <a href="tabelkelas.php" class="btn btn-info mb-2">Tabel Kelas</a> <!-- Tambahkan tombol "Tabel Pembayaran" di sini -->
    <a href="tabelsiswa.php" class="btn btn-info mb-2">Tabel Siswa</a> <!-- Tambahkan tombol "Tabel Siswa" di sini -->
    <a href="tabelpembayaran.php" class="btn btn-info mb-2">Tabel Pembayaran</a> <!-- Tambahkan tombol "Tabel Pembayaran" di sini -->
    <h2 class="mb-4">Tabel Pembayaran</h2>
    <form action="" method="GET" class="mb-3">

      <div class="container" style="margin-top: 30px">

        <div class="row">
          <div class="card-body">
            <a href="tambahpembayaran.php" class="btn btn-success mb-3">Tambah Data</a> <!-- Tambahkan tombol "Tambah Data" di sini -->
            <a href="tabelpembayaran.php" class="btn btn-warning mb-3">tampilkan semua</a>
            <!-- Tambahkan tombol "Log Out" -->
            <a href="logout.php" class="btn btn-danger mb-3">Log Out</a>
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
          <th>ID Pembayaran</th>
          <th>ID Petugas</th>
          <th>NIS</th>
          <th>Tanggal Pembayaran</th>
          <th>Jumlah Bayar</th>
          <th>opsi</th>
          <th scope="row">
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['id_pembayaran'] . "</td>";
          echo "<td>" . $row['id_petugas'] . "</td>";
          echo "<td>" . $row['NIS'] . "</td>";
          echo "<td>" . $row['tgl_bayar'] . "</td>";
          echo "<td>" . $row['jumlah_bayar'] . "</td>";
          echo "<td>";
          echo '<a href="editpembayaran.php?id_pembayaran=' . $row['id_pembayaran'] . '" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>';
          echo '<a href="hapuspembayaran.php?id_pembayaran=' . $row['id_pembayaran'] . '" class="remove btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>';
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>