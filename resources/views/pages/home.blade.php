@extends('layouts.app')

@section('title', 'Gemilang Meubel & Electronic')

@section('content')
    @include('partials.hero')

    <x-container>
        <h1 class="text-4xl text-center font-heading uppercase font-extrabold mb-8">Produk Terbaru</h1>
        <div class="w-full flex flex-wrap gap-6 items-center justify-between pb-5">
            @foreach ($products as $product)
                <x-card title="{{ $product->name }}" price="{{ $product->price }}" href="#"
                    productImageUrl="{{ asset('storage/' . $product->image) }}">
                    {{ $product->description }}
                </x-card>
@endforeach
        </div>
    </x-container>

    <x-container>
        <h1 class="text-4xl
                    text-center font-heading uppercase font-extrabold">Kenapa memilih kami?</h1>
                    <div class="w-full flex items-start justify-between gap-20 mt-10">
                        <div class="w-1/3">
                            <h2 class="text-xl uppercase font-heading font-bold mb-2">Produk Berkualitas Terjamin</h2>
                            <p class="text-lg font-body text-justify text-gray-500">
                                Setiap produk yang kami hadirkan dipilih dengan teliti, mulai dari meubel kokoh hingga
                                elektronik
                                bergaransi resmi. Kami memastikan Anda mendapatkan barang yang awet, nyaman, dan bisa
                                diandalkan dalam
                                jangka panjang.
                            </p>
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-xl uppercase font-heading font-bold mb-2">Harga Bersahabat</h2>
                            <p class="text-lg font-body text-justify text-gray-500">
                                Kami menawarkan harga yang kompetitif dengan kualitas terbaik di kelasnya. Belanja di
                                Gemilang berarti
                                Anda bisa mendapatkan produk premium dengan harga yang tetap ramah di kantong.
                            </p>
                        </div>
                        <div class="w-1/3">
                            <h2 class="text-xl uppercase font-heading font-bold mb-2">Pelayanan Cepat & Ramah</h2>
                            <p class="text-lg font-body text-justify text-gray-500">
                                Tim kami siap membantu Anda sejak proses pemesanan, pengiriman, hingga layanan purna jual.
                                Dengan
                                pelayanan yang cepat dan ramah, belanja jadi lebih mudah dan tanpa repot.
                            </p>
                        </div>
                    </div>
    </x-container>

    <x-container>
        <section class="bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
            <div class="py-20 px-4 mx-auto max-w-screen-xl text-center relative">
                <a href="#"
                    class="inline-flex justify-between items-center py-1 px-1 pe-4 mb-7 text-sm rounded-full bg-blue-900 text-blue-300 hover:bg-blue-800">
                    <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 me-3">Baru</span> <span
                        class="text-sm font-medium">Ayo kunjungi atau hubungi Gemilang meubel & electronic</span>
                    <svg class="w-2.5 h-2.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
                <h1 class="mb-4 text-5xl font-heading font-extrabold tracking-tight leading-none text-white">
                    Hadirkan Kenyamanan & Modern di Rumah Anda</h1>
                <p class="font-body tracking-wide font-normal text-xl text-gray-200">Temukan
                    furnitur dan elektronik berkualitas untuk melengkapi gaya hidup Anda.</p>
                <div class="flex flex-col space-y-4 items-center justify-center ">
                    <p class="mb-4 font-body tracking-wide font-normal text-xl text-gray-200">Dapatkan promo & katalog
                        terbaru:</p>
                    <x-button href="#" variant="blue">
                        Dapatkan Penawaran
                    </x-button>
                </div>
            </div>
        </section>

    </x-container>

    <x-container>
        <h1 class="text-4xl text-center font-heading uppercase font-extrabold">Apa Kata Mereka</h1>
        <div class="w-full flex items-start justify-between gap-20 mt-10">
            <x-testimonial name="Kadek Widiantara" shortTesti="Sangat Puas" location="Denpasar, Bali" date="3 Mar 2025"
                image="testi1.png">
                Saya membeli sofa dan meja makan dari Gemilang, kualitasnya benar-benar memuaskan. Bahannya kokoh dan
                finishing-nya rapi, sesuai dengan yang ditampilkan di katalog. Pengirimannya juga cepat, hanya dua hari
                sudah sampai rumah. Tim pemasangan sangat profesional, mereka membantu menata hingga pas di ruang tamu saya.
                Rasanya seperti belanja di toko modern dengan pelayanan personal.
            </x-testimonial>
            <x-testimonial name="Ketut Sebel" shortTesti="Percaya Dengan Gemilang Meubel" location="Badung, Bali"
                date="8 Agustus 2025" image="testi2.png">
                Saya awalnya ragu membeli elektronik secara online, tapi Gemilang benar-benar terpercaya. Saya pesan kulkas
                dan mesin cuci, keduanya bergaransi resmi dan kondisinya sangat baik. Harganya juga lebih bersahabat
                dibanding toko lain yang saya survei. Setelah sampai, langsung dipasang tanpa biaya tambahan. Saya pasti
                akan belanja lagi untuk kebutuhan rumah berikutnya.
            </x-testimonial>
            <x-testimonial name="Wiwit Nuryanti" shortTesti="Ingin Membeli Lagi" location="Karangasem, Bali"
                date="1 September 2025" image="testi3.jpg">
                Gemilang benar-benar memudahkan saya melengkapi apartemen baru. Saya membeli paket TV + meja TV, hasilnya
                sangat sesuai ekspektasi. Desainnya modern dan membuat ruangan terlihat lebih elegan. Proses pemesanan
                cepat, customer service selalu responsif menjawab pertanyaan saya. Menurut saya, Gemilang adalah pilihan
                tepat untuk belanja meubel dan elektronik dalam satu tempat.
            </x-testimonial>
        </div>
    </x-container>
@endsection
