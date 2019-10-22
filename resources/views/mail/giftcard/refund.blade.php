@component('mail::message')

# Hola



Hola, {{ $giftcard->user->name }} {{ $giftcard->user->surname }}, gracias por utilizar Giftcardreembolsable.com Giftcard!



Nota: las transferencias se hacen de lunes a viernes (no feriados) en horario de 8:00am a 4:00pm hora de Venezuela. Máximo en 48 horas (sólo días hábiles) están enviadas.


* Nombre del titular : {{ $transfer->name_titular }}

* Cedula de Identidad : {{ $transfer->dni }}

* Entidad Bancaria: {{ $transfer->bank }}

* Numero de Cuenta: {{ $transfer->bank_account }}

* Email: {{ $transfer->user->email }}

* Codigo Giftcard: {{ $giftcard->code }}

* Monto Giftcard: US$ {{ $giftcard->amount }}

* Tipo de Cambio Aplicar : Bsf. {{ number_format($transfer->rate, 2, ',', '.') }}

<!-- * Cargos de Operacion : US$ {{ $giftcard->amount * .05 }} -->

* Total Reembolsable: Bsf. {{ number_format($transfer->total_reimbursable, 2, ',', '.') }}




@component('mail::button', ['url' => env('APP_URL') . '/login'])

Inicia sesión

@endcomponent



Gracias,<br>

{{ config('app.name') }}

@endcomponent

