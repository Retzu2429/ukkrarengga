<?php
include 'koneksi.php';

// Pastikan id_kelas dikirimkan melalui URL
if(isset($_GET["id_kelas"])) {
    $id_kelas = $_GET["id_kelas"];
    
    // Eksekusi query DELETE
    $mysqli = mysqli_query($mysqli, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");

    // Periksa apakah query berhasil dieksekusi
    if ($mysqli) {
        echo '<script>alert("Berhasil hapus tanggapan"); window.location.href = "tabelkelas.php";</script>';
    } else {
        echo '<script>alert("gagal hapus tanggapan");</script>';
    }
} else {
    // Tindakan jika id_kelas tidak ditemukan dalam URL
    echo "Parameter id_kelas tidak ditemukan dalam URL.";
}
?>