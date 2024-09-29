@extends('components.prueba.app-layouts-prueba')
@section('title')
    CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/marcas-shop.css') }}">
@endsection
@section('content')
    <div class="container-marca">
        @foreach ($category as $item)
            <a href="{{ route('categoryShop', $item->Name) }}">
                    <div class="box hover-container" style="background-color: {{ $item->color }} ">
                        <h3>{{ $item->Name }}</h3>


                        <span class="hover-text">{{ $item->description }}</span>

                    </div>
                </a>
        @endforeach
    </div>
@endsection
