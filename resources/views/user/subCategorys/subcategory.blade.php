@extends('components.prueba.app-layouts-prueba')
@section('title')
    SUB-CATEGORIAS
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/user/subcategory-shop.css') }}">
@endsection
@section('content')
    <div class="container-subcategory">
        @foreach ($subcategory as $item)
            <a href="{{ route('subcategoryShop', $item->Name) }}">
                    <div class="box hover-container" style="background-color: {{ $item->color }} ">
                        <h3>{{ $item->Name }}</h3>
                        <span class="hover-text">{{ $item->description }}</span>

                    </div>
                </a>
        @endforeach
    </div>
@endsection
