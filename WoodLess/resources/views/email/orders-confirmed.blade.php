<x-mail::message>
<h1>Order Confirmed!</h1>

<?php $basket = App\Models\Basket::where('user_id', Auth::user()->id); ?>

<p>Thank you for your order.</p>

<h3>Delivery address:</h3>
<p>Birmingham. B4 7ET</p>

<x-mail::button :url="'user-panel'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
