@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-yellow-500 text-medium font-medium text-white focus:outline-none transition font-bold bg-yellow-400'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-medium font-medium text-gray-900 hover:text-white hover:bg-yellow-400 focus:outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
