<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel kelas</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

<body>

<div class="container mt-5 ">
  <h2 class="mb-4">Tabel Tambah kelas</h2>
  <form action="" method="POST" class="mb-3 ">
    <div class="card-row">
      <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="id_kelas" name="id_kelas">
      </div>
      <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="nama_kelas" name="nama_kelas">
      </div>
      <div class="form-group col-md-3">
        <input type="text" class="form-control" placeholder="kompetensi_keahlian" name="kompetensi_keahlian">
      </div>
    </div>
    <button name="submit" type="submit" class="btn btn-primary">Tambah Data</button>
    <a href="tambahkelas.php" type="submit" class="btn btn-warning">Reset</a>
  </form>
  
    <?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    // Query SQL untuk menambahkan data ke database
    $sql = "INSERT INTO kelas (id_kelas, nama_kelas, kompetensi_keahlian) VALUES ('$id_kelas', '$nama_kelas', '$kompetensi_keahlian')";

    if (mysqli_query($mysqli, $sql)) {
        echo "Data berhasil ditambahkan.";

        // Redirect ke halaman tabel_kelas.php setelah 2 detik
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'tabelkelas.php';
                });
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
}
?>
    <table class="table">
      <!-- Tabel data -->
    </table>
  </div>
</body>

</html>
