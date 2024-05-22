<h2>Data Produk</h2>

<table class="table table-bordered"><thead>
    <tr>
        <th>no</th>
        <th>nama</th>
        <th>harga</th>
        <th>kelas</th>
        <th>foto</th>
        <th>aksi</th>
    </tr>
</thead>
<tbody>
    <?php $nomor=1 ?>
    <?php $ambil=$db_koneksi->query("SELECT * FROM produk"); ?>
    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $pecah['nama_produk']; ?></td>
        <td><?php echo $pecah['harga_produk']; ?></td>
        <td><?php echo $pecah['kelas_produk']; ?></td>
        <td>
            <img src="foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
        </td>
        <td>
        <a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger">Menghapus Data Produk</a>
        <a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">Mengubah Data Produk</a>
        </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
</tbody>
</table>
<a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Data</a>