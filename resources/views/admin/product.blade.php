@extends('layouts.admin')

@section('content')
    <div class="p-2">
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div class="flex flex-row items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('admin.products.create') }}">
                <button class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">+ Add Product</button>
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr class="border-b border-gray-200">
                        <th scope="col" class="px-16 py-3">
                            <span class="">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rating
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                            <td class="p-4">
                                <img src="{{ $product->image }}" class="w-16 md:w-32 max-w-full max-h-full"
                                    alt="{{ $product->name }}">
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->description }}
                            </td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->rating }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                    class="font-medium text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 hover:underline cursor-pointer" onclick="return confirm('Yakin hapus?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
