<?php
include 'koneksi.php';

// Pastikan id_pembayaran yang akan dihapus ada
if(isset($_GET["id_pembayaran"])) {
    $id_pembayaran = $_GET["id_pembayaran"];

    // Gunakan try-catch untuk menangani exception
    try {
        $query = mysqli_query($mysqli, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
        if ($query) {
            // Redirect ke halaman tabelpembayaran setelah berhasil menghapus
            echo '<script>alert("Berhasil hapus"); window.location.href = "tabelpembayaran.php";</script>';
        } else {
            echo '<script>alert("Gagal hapus");</script>';
        }
    } catch (mysqli_sql_exception $e) {
        // Tangani exception jika gagal menghapus karena constraint foreign key
        echo '<script>alert("Gagal Menghapus Pembayaran. Data Pembayaran masih terkait dengan data lain."); window.location.href = "tabelpembayaran.php";</script>';
    }
} else {
    // Jika id_pembayaran tidak disediakan, tampilkan pesan error
    echo '<script>alert("ID Pembayaran tidak valid"); window.location.href = "tabelpembayaran.php";</script>';
}
?>
