@component('mail::message')
Welcome to Dreamworks Human Resources Department

Staff I.D: {{ $user->staff_id }} <br/>
{{-- Password : {{ $user->password }} --}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
