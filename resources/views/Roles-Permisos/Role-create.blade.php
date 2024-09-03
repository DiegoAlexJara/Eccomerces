@extends('components.admin.app-layouts-admin')
@section('title')
    CREAR ROL
@endsection
@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="">
            NOMBRE DEL NUEVO ROL
            <input type="text" name="name" id="name">
        </label>
        <input type="submit" value="CREAR ROL">
    </form>
@endsection
