@extends('components.admin.app-layouts-admin')
@section('title')
    {{ $name }}
@endsection
@section('Estilos')
<link rel="stylesheet" href="{{ asset('css/admin-form.css') }}">
@endsection
@section('content')
    @livewire('RolesPermisos', ['NameRole' => $name], key($name));   
@endsection

