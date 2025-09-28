@extends('layouts.admin')

<x-admin-navbar></x-admin-navbar>
<x-sidebar></x-sidebar>

@section('content')
    <div class="p-2 ml-64 mt-10">
        <a href="{{ route('admin.products') }}">
            <button class="bg-gray-500 text-white px-4 py-2 rounded cursor-pointer mb-4">← Back to Products</button>
        </a>
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-2">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Add a new product</h2>
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Product
                            Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="Type product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock</label>
                        <input type="number" name="stock" id="stock"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="1" required="">
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="$2999" required="">
                    </div>
                    <div class="w-full">
                        <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
                        <input type="number" name="rating" id="rating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            placeholder="$2999" required="">
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="image">Upload
                            file</label>
                        <input
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            aria-describedby="image" name="image" id="image" type="file">
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF
                            (MAX. 800x400px).</p>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                        <textarea id="description" name="description" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="Your description here"></textarea>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-800 cursor-pointer rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800">
                    Add product
                </button>
            </form>
        </div>
    </div>
@endsection