@extends('layouts.auth')

@section('title', 'Confirma tu cuenta')

@section('auth-contents')

    <p class="text-xl italic font-semibold">Tu cuenta fue creada exitosamente. Por favor, verifica tu correo electrónico para continuar.</p>

   @if (session('success'))
       <x-alert :message="session('success')" />
   @endif

    <form method="POST" action="{{ route('verification.send') }}" class="mt-5">
        @csrf
        <button
            type="submit"
            class="bg-purple-950 hover:bg-purple-800 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer"
        >
            Reenviar Correo de Verificación
        </button>
    </form>

@endsection
