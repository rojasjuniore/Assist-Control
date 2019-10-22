@component('mail::message')
Buenas

Hola, {{ $giftcard->user->name . ' ' . $giftcard->user->surname }}, la solicitud ya fue ejectuada,
esperamos su comentario en Facebook, ya que para nosotros es de gran importancia...


Inicia sesión para que puedas ver el estatus de tu transferencia.
@component('mail::button', ['url' => env('APP_URL') . 'login'])
Inicia sesión
@endcomponent

<img src="{{ env('APP_URL') . $transfer->capture }}" alt="">

Gracias,<br>
{{ config('app.name') }}
@endcomponent
