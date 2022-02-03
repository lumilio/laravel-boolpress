@component('mail::message')
# Welcome !





<p>{{ $name }} è un Nuovo utente!</p>


@component('mail::button', ['url' => 'http://localhost:8000/'])
Vai al sito
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
