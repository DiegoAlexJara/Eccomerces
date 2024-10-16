@extends('components.prueba.app-layouts-prueba')
@section('title')
CARRITO
@endsection
@section('Estilos')
<link rel="stylesheet" href="{{ asset('css/user/carrito.css') }}">
@endsection
@section('content')
<style>
    body{
        background:  #ff8c00;
    }
</style>
<h1 class="text-center mb-4">Carrito de Compras</h1>
@livewire('Carrito')

@endsection