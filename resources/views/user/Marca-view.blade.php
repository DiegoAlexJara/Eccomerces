@extends('components.prueba.app-layouts-prueba')
@section('title')
    {{ $name }}
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection
@section('content')
    <style>
        body {
            background-color: {{ $marca->color }};
        }
    </style>
    <h1 class="text-center mb-4">PRODUCTOS</h1>

    <div class="container">
        @foreach ($products as $item)
            <div class="product-card">

                <div class="product-details">
                    <h2 class="product-title">{{ $item->Name }}</h2>
                    <p class="product-price">${{ $item->price }}</p>
                    <p class="product-description">{{ $item->description }}</p>
                    <button class="add-to-cart">Añadir al carrito</button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-grid gap-2">
        <a href="{{ route('marcas') }}"><button class="btn btn-primary" type="button">REGRESAR</button></a>
    </div>
@endsection
