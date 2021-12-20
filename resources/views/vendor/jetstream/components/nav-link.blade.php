@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 leading-5 focus:outline-none transition bg-yellow-400 text-white font-bold'
            : 'inline-flex items-center px-1 pt-1 leading-5 hover:bg-yellow-400
            hover:text-white focus:outline-none focus:bg-yellow-400 transition text-white font-bold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
