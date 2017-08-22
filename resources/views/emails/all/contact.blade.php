@component('mail::message')
# {{ $content['salutation'] }}

{{ $content['body'] }}

@component('mail::button', ['url' => ''])
{{ $content['button'] }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
