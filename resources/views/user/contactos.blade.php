@extends('components.prueba.app-layouts-prueba')
@section('title')
    CONTACTO
@endsection
@section('Estilos')
    <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
@endsection
@section('content')
    <div class="contact-section">
        <h2>Contacto</h2>

        <p>Si tienes alguna pregunta o comentario, no dudes en ponerte en contacto con nosotros:</p>

        <h3>Información de Contacto</h3>
        <p><strong>Teléfono:</strong> +123 456 7890</p>
        <p><strong>Correo Electrónico:</strong> info@tiendadecomics.com</p>
        <p><strong>Dirección:</strong> Calle Ejemplo 123, Ciudad, País</p>
        <p><strong>Horario de Atención:</strong> Lunes a Viernes de 10:00 a 18:00</p>

        <h3>COMENTARIO</h3>
        @livewire('Comentarios')

        <h3>Síguenos en Redes Sociales</h3>
        <p><a href="https://facebook.com/">Facebook</a></p>
        <p><a href="https://instagram.com/">Instagram</a></p>
        <p><a href="https://twitter.com/">Twitter</a></p>

        <h3>Ubicación</h3>
        <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7465.773748349405!2d-103.35765220642088!3d20.67418090000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b1fa62260927%3A0xcc1caafc1fb1c91c!2sFrikiplaza%20Guadalajara!5e0!3m2!1ses-419!2smx!4v1728326657997!5m2!1ses-419!2smx"
                width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection
