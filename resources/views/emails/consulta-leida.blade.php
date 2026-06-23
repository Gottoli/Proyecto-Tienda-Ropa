<x-mail::message>
# Hola {{ $consulta->nombre }},

Te escribimos para avisarte que tu consulta sobre **"{{ $consulta->motivo }}"** ya fue leída por nuestro equipo.

> {{ $consulta->consulta }}

En breve nos vamos a poner en contacto con vos si tu consulta requiere una respuesta.

<x-mail::button :url="config('app.url')">
Visitar LISBON™
</x-mail::button>

Gracias por escribirnos,<br>
{{ config('app.name') }}
</x-mail::message>
