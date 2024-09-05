@extends('components.user.app-layouts-user')
@section('title')
INICIO
@endsection
@section('content')
@session('error')
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endsession
@endsection