@component('mail::message')
# Hola {{$user->name}}

Has cambiado tu email. Por favor verifícala la nueva dirección usando el siguiente boton:

@component('mail::button', ['url' => route('verify', $user->verification_token)])
Confirmar mi cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent