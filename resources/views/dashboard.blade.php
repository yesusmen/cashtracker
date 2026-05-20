@extends('layouts.auth')

@section('title', 'Dashboard')

@section('auth-contents')
    @if (session('success'))
        <p class="mt-5 text-lg font-semibold w-full bg-amber-500 border border-l-4 border-green-600 text-green-600 text-center">
            {{ session('success') }}
        </p>
    @endif
    <p class="mt-5 text-lg text-black text-center">
        Bienvenido a tu panel de control, {{ auth()->user()->name }}.
    </p>
@endsection
