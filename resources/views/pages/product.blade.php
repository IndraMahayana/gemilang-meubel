@extends('layouts.app')

@section('content')
    <x-container>
        <h1 class="text-4xl text-center font-heading uppercase font-extrabold mb-8">Produk Kami</h1>
        <div class="w-full h-fit grid grid-cols-3 gap-6 items-start justify-between pb-5">
            @foreach ($products as $product)
                <x-card title="{{ $product->name }}" price="{{ $product->price_rupiah }}" href="#"
                    productImageUrl="{{ asset('storage/' . $product->image) }}">
                    We create modern, scalable web apps tailored for your business.
                </x-card>
            @endforeach
        </div>
        <div class="flex justify-center mt-6">
            {{ $products->links() }}
        </div>
    </x-container>
@endsection
