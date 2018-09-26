@component('mail::message')
{!! str_replace('{button}', '<a href="'.route('email_verification',$token).'">Verificate</a>', $text->translate()->body) !!}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
