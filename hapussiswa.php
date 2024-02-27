<?php
include 'koneksi.php';

$NIS = $_GET["NIS"];

try {
    $query = mysqli_query($mysqli, "DELETE FROM siswa WHERE NIS='$NIS'");
    if ($query) {
        echo '<script>alert("Berhasil hapus"); window.location.href = "tabelsiswa.php";</script>';
    } else {
        echo '<script>alert("Gagal hapus");</script>';
    }
}catch (mysqli_sql_exception $e) {
    echo '<script>alert("Gagal Menghapus Siswa Karena Memiliki Data Pembayaran"); window.location.href = "tabelsiswa.php";</script>';
}

?>