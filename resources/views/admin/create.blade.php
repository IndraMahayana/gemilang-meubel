<h1>Tambah Produk</h1>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <p>Nama: <input type="text" name="name" id="name" required></p>
    <p>Deskripsi: <textarea name="description"></textarea></p>
    <p>Harga: <input type="number" name="price" required></p>
    <p>Stok: <input type="number" name="stock" required></p>
    <p>Gambar: <input type="file" name="image"></p>
<p>Rating: <input type="number" name="rating" min="0" max="5" step="0.1"></p>
    <button type="submit">Simpan</button>
</form>
