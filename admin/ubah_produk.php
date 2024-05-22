<h2>Ubah Produk</h2>
<?php
$db_koneksi = new mysqli("localhost", "root", "", "db_hphub"); 

$ambil = $db_koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
    </div>
    <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" value="<?php echo $pecah['kelas_produk']; ?>">
    </div>
    <div class="form-group">
        <img src="foto_produk/<?php echo $pecah['foto_produk'] ?>" width="100">
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
    </div>
    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];

    if (!empty($lokasifoto)) {
        move_uploaded_file($lokasifoto, "foto_produk/$namafoto");

        $db_koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',kelas_produk='$_POST[kelas]',
        foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]'
        WHERE id_produk='$_GET[id]'");
    } else {
        $db_koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',
        harga_produk='$_POST[harga]',kelas_produk='$_POST[kelas]', 
        deskripsi_produk='$_POST[deskripsi]' WHERE id_produk='$_GET[id]'");
    }
    echo "<script>alert('Data Produk Telah Di Ubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}
?>