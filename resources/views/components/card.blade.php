@props(['title' => '', 'href' => '#', 'productImageUrl' => '', 'price' => 'Rp -'])

<div class="bg-white border w-full h-fit border-gray-200 rounded-lg shadow-sm">
    <a href="{{$href}}">
        <img class="rounded-t-lg w-full h-80 object-cover" src="{{$productImageUrl}}" alt="{{$title}}" />
    </a>
    <div class="p-4 h-full flex flex-col items-stretch justify-between">
        <a href="{{$href}}">
            <h5 class="text-xl font-bold tracking-tight text-gray-900">{{$title}}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                @for ($i = 0; $i < 5; $i++)
                   <x-star />
                @endfor
            </div>
            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded-sm ms-3">5.0</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900">{{$price}}</span>
            <x-button href="https://wa.me/6281234567890?text=Hello%20Gemilang%20Meubel%2C%20I%20would%20like%20to%20inquire%20about%20your%20products." width="" height="h-10">
                Contact Us
            </x-button>
        </div>
    </div>
</div>

