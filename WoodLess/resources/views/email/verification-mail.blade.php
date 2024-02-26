<x-mail::message>
# Hello, {{$name}},
<p>Welcome to Woodless, click on this code to confirm your registration.</p>

<x-mail::button :url="route('user.verify', ['code' => $verificationCode])">
Verify Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
