@component('mail::message')

<h3>Bonjour Mr {{$data['owner']['firstname']}} {{$data['owner']['lastname']}}</h3>

Votre voiture {{ $data['car']['brand'] }} {{ $data['car']['model'] }} votre voiture a été
 enrégistrer dans notre parcking.
 <br>
 Nous remercions de votre fidélité.


Merci,<br>
{{ config('app.name') }}
@endcomponent
