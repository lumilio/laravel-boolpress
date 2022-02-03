@component('mail::message')
# Risposta




<p>From: Bollpress staff</p>
<p>Message: {{ $contentanswer }}</p>


@component('mail::button', ['url' => 'http://localhost:8000/'])
Vai al sito
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
