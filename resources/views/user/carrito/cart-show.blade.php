@extends('components.prueba.app-layouts-prueba')
@section('title')
CARRITO
@endsection
@section('Estilos')
<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
@endsection
@section('content')
<h1 class="text-center mb-4">Carrito de Compras</h1>
@livewire('Carrito')

@endsection