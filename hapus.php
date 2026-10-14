<?php
include 'koneksi.php';
mysqli_query($db, "DELETE FROM pesanan WHERE id='$_GET[id]'");
header("location:index.php");
?>