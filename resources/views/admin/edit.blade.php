<h1>Edit Produk</h1>
<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p>Nama: <input type="text" name="name" value="{{ $product->name }}" required></p>
    <p>Deskripsi: <textarea name="description">{{ $product->description }}</textarea></p>
    <p>Harga: <input type="number" name="price" value="{{ $product->price }}" required></p>
    <p>Stok: <input type="number" name="stock" value="{{ $product->stock }}" required></p>
    <p>Gambar: 
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100"><br>
        @endif
        <input type="file" name="image">
    </p>
    <p>Rating: <input type="number" name="rating" value="{{ $product->rating }}"></p>
    <button type="submit">Update</button>
</form>
