Hola {{$user->name}}

Has cambiado tu email. Por favor verifícala la nueva dirección usando el siguiente enlace:

{{ route('verify', $user->verification_token) }}