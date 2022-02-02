@component('mail::message')
# Introduction


The body of your message.
Message: {{ $content }}
From: {{ $name }}
Email: {{ $email }}
The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
