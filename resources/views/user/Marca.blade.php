@extends('components.prueba.app-layouts-prueba')
@section('title')
    MARCAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/user/marcas-shop.css') }}">
@endsection
@section('content')

    <div class="container-marca">
        @foreach ($marcas as $item)
            <a href="{{ route('marcaShop', $item->Name) }}">
                <div class="box hover-container" style="background-color: {{ $item->color }} ">
                    <div class="background-image"
                        style="background-image: url('{{ asset('storage/' . $item->path) }}');background-size: cover; height:350px; background-position: center;">
                        <span class="hover-text">
                            <p>{{ $item->Name }}</p>{{ $item->description }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
