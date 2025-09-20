@props([
    'href' => '#',
    'variant' => '',
    'height' => 'h-10',
    'width' => 'w-fit',
    'fontSize' => 'text-sm',
    'class' => ''
])

@php
    $variants = [
        'red' => 'bg-red-700 hover:bg-red-800 text-white',
        'blue' => 'bg-blue-700 hover:bg-blue-800 text-white',
        'green' => 'bg-green-700 hover:bg-green-800 text-white',
    ];

    $color = $variants[$variant] ?? $variants['blue'];
@endphp

<a href="{{ $href }}"
   target="_blank"
   class="flex items-center justify-center focus:outline-none font-heading font-bold rounded-lg text-sm px-4 py-2 text-center {{ $color }} {{ $height }} {{ $width }} {{$fontSize}} {{$class}}">
   {{ $slot }}
</a>