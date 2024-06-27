<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" required>
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" required>
    </div>
    <div class="form-group">
        <label>Kelas</label>
        <input type="text" class="form-control" name="kelas" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10" required></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto" required>
    </div>
    <button class="btn btn-primary" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan']))
{
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    
    if (!empty($nama) && !empty($lokasi)) {
        move_uploaded_file($lokasi, "foto_produk/" . $nama);

        $nama_produk = $db_koneksi->real_escape_string($_POST['nama']);
        $harga_produk = $db_koneksi->real_escape_string($_POST['harga']);
        $kelas_produk = $db_koneksi->real_escape_string($_POST['kelas']);
        $deskripsi_produk = $db_koneksi->real_escape_string($_POST['deskripsi']);

        $db_koneksi->query("INSERT INTO produk
        (nama_produk, harga_produk, kelas_produk, foto_produk, deskripsi_produk)
        VALUES('$nama_produk', '$harga_produk', '$kelas_produk', '$nama', '$deskripsi_produk')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupload foto</div>";
    }
}
?>
