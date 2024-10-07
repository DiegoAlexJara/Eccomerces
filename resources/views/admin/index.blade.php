@extends('components.admin.app-layouts-admin')
@section('title')
    ADMINISTRADOR
@endsection
@section('Estilos')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('content')
    <h1>COMENTARIOS</h1>
    <p>comentarios del sitio web</p>
    @foreach ($comments as $item)
        <div class="comment">
            <div class="comment-header">
                <strong>{{ $item->user->name }}</strong> <!-- Nombre del usuario -->
                <span class="comment-date">{{ $item->created_at->format('d/m/Y H:i') }}</span>
                <!-- Fecha del comentario -->
            </div>
            <p class="comment-body">{{ $item->comment }}</p> <!-- Texto del comentario -->
        </div>
    @endforeach
@endsection
