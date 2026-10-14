<?php
include 'koneksi.php';
$id = $_GET['id'];
$d = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM pesanan WHERE id='$id'"));
$no_wa = isset($d['whatsapp']) ? $d['whatsapp'] : (isset($d['wa']) ? $d['wa'] : '');

if (isset($_POST['update'])) {
    $nama    = $_POST['nama'];
    $wa      = $_POST['wa'];
    $layanan = $_POST['layanan'];
    $berat   = $_POST['berat'];

    mysqli_query($db, "UPDATE pesanan SET nama='$nama', whatsapp='$wa', layanan='$layanan', berat='$berat' WHERE id='$id'");
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LaundryWoy - Edit Pesanan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 450px; margin: 40px auto; }
        .card { background: white; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb; }
        h2 { margin-top: 0; color: #1f2937; font-size: 18px; }
        label { display: block; font-size: 13px; font-weight: 600; margin: 10px 0 4px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; }
        .btn { background: #2563eb; color: white; border: none; padding: 9px 16px; border-radius: 6px; font-weight: bold; cursor: pointer; text-decoration: none; display: block; width: 100%; margin-top: 15px; font-size: 13px; text-align: center; box-sizing: border-box; }
        .btn-cancel { background: #6b7280; margin-top: 8px; }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit Data Pesanan LaundryWoy</h2>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($d['nama']); ?>" required>

            <label>No. WhatsApp</label>
            <input type="text" name="wa" value="<?= htmlspecialchars($no_wa); ?>" required>

            <label>Layanan</label>
            <select name="layanan">
                <option value="Reguler" <?= $d['layanan']=='Reguler'?'selected':''; ?>>Reguler</option>
                <option value="Express" <?= $d['layanan']=='Express'?'selected':''; ?>>Express</option>
                <option value="Kilat" <?= $d['layanan']=='Kilat'?'selected':''; ?>>Kilat</option>
            </select>

            <label>Berat (Kg)</label>
            <input type="number" name="berat" value="<?= htmlspecialchars($d['berat']); ?>" required>

            <button type="submit" name="update" class="btn">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-cancel">Batal</a>
        </form>
    </div>
</div>

</body>
</html>