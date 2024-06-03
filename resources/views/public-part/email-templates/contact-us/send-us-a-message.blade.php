@component('mail::message')
# {{ $_name }}

Telefon: {{ $_phone }}, <br>
Email: {{ $_email }} <br>
@if(isset($_reason))Razlog: {{ $_reason }} <br> @endif


Poruka: {{ $_message }}

{{ __('Hvala Vam što koristite naš sistem!') }}
{{ __('Ugodan ostatak dana') }},<br>
<a href="{{ env('APP_DOMAIN') }}"> {{ 'Euro-Plac d.o.o Cazin' }} </a>
@endcomponent
