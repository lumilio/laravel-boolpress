@component('mail::message')
# Introduction




<p>From: {{ $email }} - {{ $name }}</p>
<p>Message: {{ $content }}</p>


@component('mail::button', ['url' => 'http://localhost:8000/'])
Vai al sito
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
