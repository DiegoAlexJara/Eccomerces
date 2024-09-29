@extends('components.prueba.app-layouts-prueba')
@section('title')
    MARCAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/marcas-shop.css') }}">
@endsection
@section('content')
    <div class="container-marca">
        @foreach ($marcas as $item)
            <a href="{{ route('marcaShop', $item->Name) }}">
                    <div class="box hover-container" style="background-color: {{ $item->color }} ">
                        <h3>{{ $item->Name }}</h3>


                        <span class="hover-text">{{ $item->description }}</span>

                    </div>
                </a>
        @endforeach
    </div>
@endsection
