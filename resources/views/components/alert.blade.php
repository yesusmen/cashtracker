@props(['type' => 'success', 'message' => ''])

@php
    $colors = [
        'success' => 'fa-border-green-700 bg-green-100 text-green-700',
        'error' => 'fa-border-red-700 bg-red-100 text-red-700',
        'warning' => 'fa-border-yellow-700 bg-yellow-100 text-yellow-700',
        'info' => 'fa-border-blue-700 bg-blue-100 text-blue-700',
    ];

    $class = $colors[$type] ?? $colors['info'];

@endphp

@if ($message)
    <p class="my-10 text-center border-l-8 py-3 text-sm font-bold uppercase {{ $class }}">
        {{ $message }}
    </p>
@endif
