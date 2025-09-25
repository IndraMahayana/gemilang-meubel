<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Gemilang Meubel</title>
</head>
<body>
    <h1>Dashboard Admin</h1>

    <a href="{{ route('admin.products.create') }}">+ Tambah Produk</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>Rp {{ number_format($product->price,0,',','.') }}</td>
            <td>{{ $product->stock }}</td>
            <td>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
