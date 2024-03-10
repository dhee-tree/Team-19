<x-mail::message>
<h2>Order Confirmed!</h2>

<p>Thank you for your order.</p>

<p>Your order number is: <strong> {{ $order->id }}</strong></p>

<h3>Here are the items in your order:</h3>
<ul>
    @foreach ($order->products as $product)
        <li>
            {{ $product->pivot->amount }}x <a href="{{ url('/product/' . $product->id) }}">{{ $product->title }}</a> <span> - £{{ $product->pivot->product_cost }}</span>
        </li>
    @endforeach
</ul>

<h4>Total cost: {{ $order->order_cost }}</h4>

<h3>Delivery Address:</h3>
<?php 
    $address = App\Models\Address::where('id', $order->address_id)->first();
?>

<p>{{ $address->house_number }} {{ $address->street_name }}, {{ $address->city }}. {{ $address->postcode }}</p>

<x-mail::button :url="route('user.view-purchase', $order->id)">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
