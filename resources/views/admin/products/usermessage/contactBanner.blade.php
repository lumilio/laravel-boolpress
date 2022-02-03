@component('mail::message')
# Un nuovo prodotto è stato aggiunto!





<p>Titolo Prodotto: {{ $name }}</p>
<p>Crato da utente n.{{ $user }}</p>


@component('mail::button', ['url' => 'http://localhost:8000/'])
Vai al sito
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
