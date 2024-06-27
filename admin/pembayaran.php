<h2>Data Pembayaran</h2>

<?php 
$id_pembelian = $_GET['id'];

if ($db_koneksi) {
    $ambil = $db_koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
    $detail = $ambil->fetch_assoc();
    
    if (!$detail) {
        echo "<div class='alert alert-danger'>Data pembayaran tidak ditemukan.</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>Koneksi ke database gagal.</div>";
    exit;
}
?>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?php echo htmlspecialchars($detail['nama']); ?></td>
            </tr>
            <tr>
                <th>Bank</th>
                <td><?php echo htmlspecialchars($detail['bank']); ?></td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>Rp. <?php echo number_format($detail['jumlah']); ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?php echo htmlspecialchars($detail['tanggal']); ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <img src="../bukti_pembayaran/<?php echo htmlspecialchars($detail['bukti']); ?>" alt="" class="img-responsive">
    </div>
</div>

<form method="post">
    <div class="form-group">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="">Pilih Status</option>
            <option value="Pembelian Sukses">Pembelian Sukses</option>
            <option value="Batal">Batal</option>
        </select>
    </div>
    <button class="btn btn-primary" name="proses">Update Status Pembayaran</button>
</form>

<?php
if (isset($_POST["proses"]))
{
    $status = $_POST["status"];
    
    if ($status) {
        $db_koneksi->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");
    
        echo "<script>alert('data pembelian terupdate');</script>";
        echo "<script>location='index.php?halaman=pembelian';</script>";
    } else {
        echo "<script>alert('Silakan isi semua data dengan benar.');</script>";
    }
}
?>
