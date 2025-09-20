@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <x-container>
        <h1 class="text-4xl text-center font-heading uppercase font-extrabold mb-8">Gemilang Meubel & Electroninc</h1>
        <div class="w-full flex gap-6 items-center justify-between">
            <div class="w-1/2">
                <h2 class="text-2xl font-heading font-bold mb-4">Tentang Kami</h2>
                <p class="text-lg font-body text-justify text-gray-500 mb-4">
                    Gemilang Meubel & Electronic adalah toko online terkemuka yang menyediakan berbagai macam meubel dan
                    elektronik berkualitas tinggi. Kami berkomitmen untuk memberikan produk terbaik dengan harga yang
                    kompetitif, serta pelayanan pelanggan yang ramah dan profesional.
                </p>
                <p class="text-lg font-body text-justify text-gray-500 mb-4">
                    Dengan pengalaman bertahun-tahun di industri ini, kami memahami kebutuhan pelanggan kami dan selalu
                    berusaha untuk memenuhi harapan mereka. Kami bekerja sama dengan merek-merek terpercaya untuk
                    memastikan bahwa setiap produk yang kami tawarkan adalah yang terbaik di kelasnya.
                </p>
                <p class="text-lg font-body text-justify text-gray-500">
                    Visi kami adalah menjadi pilihan utama bagi pelanggan yang mencari meubel dan elektronik berkualitas,
                    serta menciptakan pengalaman belanja online yang menyenangkan dan mudah. Terima kasih telah memilih
                    Gemilang Meubel & Electronic sebagai mitra Anda dalam memenuhi kebutuhan rumah tangga Anda.
                </p>
            </div>
            <div class="h-[500px]">
                <img src="/images/about/about1.png" alt="About Image" class="w-auto h-full object-cover">
            </div>
        </div>
    </x-container>
@endsection
