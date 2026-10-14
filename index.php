<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama    = $_POST['nama'];
    $wa      = $_POST['wa'];
    $layanan = $_POST['layanan'];
    $berat   = $_POST['berat'];

    mysqli_query($db, "INSERT INTO pesanan (nama, whatsapp, layanan, berat) VALUES ('$nama', '$wa', '$layanan', '$berat')");
    header("location:index.php");
}

$data = mysqli_query($db, "SELECT * FROM pesanan ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LaundryWoy - CRUD Pesanan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f3f4f6; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 750px; margin: auto; }
        .card { background: white; padding: 20px; border-radius: 8px; border: 1px solid #e5e7eb; margin-bottom: 20px; }
        h2 { margin-top: 0; color: #1f2937; font-size: 18px; }
        label { display: block; font-size: 13px; font-weight: 600; margin: 10px 0 4px; }
        input, select { width: 100%; padding: 8px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; }
        .btn-submit { width: 100%; margin-top: 15px; background: #2563eb; color: white; border: none; padding: 9px; border-radius: 6px; font-weight: bold; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border-bottom: 1px solid #e5e7eb; padding: 10px; text-align: left; font-size: 14px; }
        th { background: #f9fafb; color: #4b5563; }
        a.action-link { color: #2563eb; text-decoration: none; font-weight: 600; }
        a.action-link.delete { color: #dc2626; }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah Pesanan LaundryWoy</h2>
        <form method="POST">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required placeholder="Nama pemesan">

            <label>No. WhatsApp</label>
            <input type="text" name="wa" required placeholder="08xxxxxxxxxx">

            <label>Layanan</label>
            <select name="layanan">
                <option value="Reguler">Reguler (Rp 7.000 / Kg)</option>
                <option value="Express">Express (Rp 11.000 / Kg)</option>
                <option value="Kilat">Kilat (Rp 16.000 / Kg)</option>
            </select>

            <label>Berat (Kg)</label>
            <input type="number" name="berat" required placeholder="Contoh: 3">

            <button type="submit" name="simpan" class="btn-submit">Kirim Pesanan</button>
        </form>
    </div>

    <div class="card">
        <h2>Data Pesanan Masuk (CRUD)</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No WA</th>
                <th>Layanan</th>
                <th>Berat</th>
                <th>Aksi</th>
            </tr>
            <?php 
            $no = 1; 
            while($d = mysqli_fetch_array($data)) { 
                $no_wa = isset($d['whatsapp']) ? $d['whatsapp'] : (isset($d['wa']) ? $d['wa'] : '');
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($d['nama']); ?></td>
                <td><?= htmlspecialchars($no_wa); ?></td>
                <td><?= htmlspecialchars($d['layanan']); ?></td>
                <td><?= htmlspecialchars($d['berat']); ?> Kg</td>
                <td>
                    <a href="edit.php?id=<?= $d['id']; ?>" class="action-link">Edit</a> | 
                    <a href="hapus.php?id=<?= $d['id']; ?>" class="action-link delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>