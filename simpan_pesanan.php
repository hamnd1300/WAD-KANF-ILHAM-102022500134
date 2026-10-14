<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = $_POST['nama'];
    $whatsapp = $_POST['whatsapp'];
    $layanan  = $_POST['layanan'];
    $berat    = $_POST['berat'];

    $query = "INSERT INTO pesanan (nama, whatsapp, layanan, berat) VALUES ('$nama', '$whatsapp', '$layanan', '$berat')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Pesanan berhasil dibuat!'); window.location.href='index.php';</script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>