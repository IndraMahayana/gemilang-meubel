@props([
    'name' => '',
    'shortTesti' => '',
    'location' => '',
    'date' => '',
    'image' => '',
])

<article>
    <div class="flex items-center mb-4">
        <img class="w-10 h-10 me-4 rounded-full" src="/images/testiImage/{{ $image }}" alt="">
        <div class="text-lg font-medium">
            <p>{{ $name }}</p>
        </div>
    </div>
    <div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">
        <x-star />
        <x-star />
        <x-star />
        <x-star />
        <x-star />
        <h3 class="ms-2 text-sm font-semibold text-gray-900">{{ $shortTesti }}</h3>
    </div>
    <footer class="mb-5 text-sm text-gray-500">
        <p>{{ $location }} <time datetime="2017-03-03 19:00">{{ $date }}</time></p>
    </footer>
    <p class="mb-2 text-justify text-base text-gray-500">
        {{ $slot }}
    </p>
</article>
