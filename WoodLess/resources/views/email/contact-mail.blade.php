<x-mail::message>
# Hello, a new user wants to get in touch!

<h3>Name: {{ $data['name'] }}</h3>
<h3>Email: {{ $data['email'] }}</h3>
<h3>Phone: {{ $data['phone'] }}</h3>
<h3>Message: {{ $data['message'] }}</h3>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
