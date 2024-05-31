function toggleSearch() {
    const searchInput = document.getElementById('search');
    if (searchInput.style.display === 'none') {
        searchInput.style.display = 'inline-block';
        setTimeout(() => {
            searchInput.classList.add('visible');
        }, 10);
    } else {
        searchInput.classList.remove('visible');
        setTimeout(() => {
            searchInput.style.display = 'none';
        }, 500);
    }
}

function cariProduk() {
  const query = document.getElementById('search').value;
  fetch(`search.php?query=${query}`)
      .then(response => response.json())
      .then(data => {
          const containerProduk = document.querySelector('.row.row-cols-1.row-cols-md-4.g-4');
          containerProduk.innerHTML = '';
          data.forEach(produk => {
              const kartuProduk = `
                  <div class="col">
                      <div class="card card-custom mx-auto">
                          <img src="admin/foto_produk/${produk.foto_produk}" class="card-img-top" alt="${produk.nama_produk}">
                          <div class="card-body">
                              <h5 class="card-title text-center">${produk.nama_produk}</h5>
                              <p class="card-text text-center">Rp. ${new Intl.NumberFormat('id-ID').format(produk.harga_produk)}</p>
                              <div class="text-center">
                                  <a href="beli.php?id=${produk.id_produk}" class="btn btn-primary">Beli</a>
                                  <a href="tambah_favorit.php?id=${produk.id_produk}" class="btn btn-warning">Favorit</a>
                                  <a href="detail.php?id=${produk.id_produk}" class="btn btn-secondary">Detail</a>
                              </div>
                          </div>
                      </div>
                  </div>
              `;
              containerProduk.innerHTML += kartuProduk;
          });

          const productGallery = document.querySelector('.product-gallery');
          window.scrollBy({ top: productGallery.offsetTop, behavior: 'smooth' });
      });
}
