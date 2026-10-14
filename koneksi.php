<?php
$db = mysqli_connect("localhost", "root", "", "laundry_db");
if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>