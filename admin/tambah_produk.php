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
        <label>Ram</label>
        <input type="number" class="form-control" name="ram" required>
    </div>
    <div class="form-group">
        <label>Rom</label>
        <input type="number" class="form-control" name="rom" required>
    </div>
    <div class="form-group">
        <label>Rom 2</label>
        <input type="number" class="form-control" name="rom2" required>
    </div>
    <div class="form-group">
        <label>Rom 3</label>
        <input type="number" class="form-control" name="rom3" required>
    </div>
    <div class="form-group">
        <label>Chipset</label>
        <input type="text" class="form-control" name="chipset" required>
    </div>
    <div class="form-group">
        <label>Os</label>
        <input type="text" class="form-control" name="os" required>
    </div>
    <div class="form-group">
        <label>Gpu</label>
        <input type="text" class="form-control" name="gpu" required>
    </div>
    <div class="form-group">
        <label>Camera</label>
        <input type="text" class="form-control" name="camera" required>
    </div>
    <div class="form-group">
        <label>Loudspeaker</label>
        <input type="text" class="form-control" name="loudspeaker" required>
    </div>
    <div class="form-group">
        <label>Wlan</label>
        <input type="text" class="form-control" name="wlan" required>
    </div>
    <div class="form-group">
        <label>Nfc</label>
        <input type="text" class="form-control" name="nfc" required>
    </div>
    <div class="form-group">
        <label>Usb</label>
        <input type="text" class="form-control" name="usb" required>
    </div>
    <div class="form-group">
        <label>Battery</label>
        <input type="number" class="form-control" name="battery" required>
    </div>
    <div class="form-group">
        <label>Charging</label>
        <input type="number" class="form-control" name="charging" required>
    </div>
    <div class="form-group">
        <label>Colors</label>
        <input type="text" class="form-control" name="colors" required>
    </div>
    <div class="form-group">
        <label>Models</label>
        <input type="text" class="form-control" name="models" required>
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
    $nama_file = $_FILES['foto']['name'];
    $lokasi_file = $_FILES['foto']['tmp_name'];
    
    if (!empty($nama_file) && !empty($lokasi_file)) {
        move_uploaded_file($lokasi_file, "foto_produk/" . $nama_file);

        $nama_produk = $db_koneksi->real_escape_string($_POST['nama']);
        $harga_produk = $db_koneksi->real_escape_string($_POST['harga']);
        $kelas_produk = $db_koneksi->real_escape_string($_POST['kelas']);
        $ram_produk = $db_koneksi->real_escape_string($_POST['ram']);
        $rom_produk = $db_koneksi->real_escape_string($_POST['rom']);
        $rom2_produk = $db_koneksi->real_escape_string($_POST['rom2']);
        $rom3_produk = $db_koneksi->real_escape_string($_POST['rom3']);
        $chipset_produk = $db_koneksi->real_escape_string($_POST['chipset']);
        $os_produk = $db_koneksi->real_escape_string($_POST['os']);
        $gpu_produk = $db_koneksi->real_escape_string($_POST['gpu']);
        $camera_produk = $db_koneksi->real_escape_string($_POST['camera']);
        $loudspeaker_produk = $db_koneksi->real_escape_string($_POST['loudspeaker']);
        $wlan_produk = $db_koneksi->real_escape_string($_POST['wlan']);
        $nfc_produk = $db_koneksi->real_escape_string($_POST['nfc']);
        $usb_produk = $db_koneksi->real_escape_string($_POST['usb']);
        $battery_produk = $db_koneksi->real_escape_string($_POST['battery']);
        $charging_produk = $db_koneksi->real_escape_string($_POST['charging']);
        $colors_produk = $db_koneksi->real_escape_string($_POST['colors']);
        $models_produk = $db_koneksi->real_escape_string($_POST['models']);

        $db_koneksi->query("INSERT INTO produk
        (nama_produk, harga_produk, kelas_produk, ram, rom, rom2, rom3, chispet, os, gpu, camera, loudspeaker, wlan, nfc, usb, battery, charging, colors, models, foto)
        VALUES('$nama_produk', '$harga_produk', '$kelas_produk', '$ram_produk', '$rom_produk', '$rom2_produk', '$rom3_produk', '$chipset_produk', '$os_produk', '$gpu_produk', '$camera_produk', '$loudspeaker_produk', '$wlan_produk', '$nfc_produk', '$usb_produk', '$battery_produk', '$charging_produk', '$colors_produk', '$models_produk', '$nama_file')");

        echo "<div class='alert alert-info'>Data Tersimpan</div>";
        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupload foto</div>";
    }
}
?>
