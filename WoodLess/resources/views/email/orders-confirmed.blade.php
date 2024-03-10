<x-mail::message>
<h2>Order Confirmed!</h2>

<p>Thank you for your order.</p>

<p>Your order number is: <strong> {{ $order->id }}</strong></p>

<h3>Here are the items in your order:</h3>
<ul>
    @foreach ($order->products as $product)
        @if ($product->discount > 0)
            <?php $discount = round($product->cost - ($product->cost * ($product->discount / 100)), 2); 
                $price = $discount * $product->pivot->amount;
            ?>
        @else
            <?php $price = $product->cost * $product->pivot->amount; ?>
        @endif
        <li>
            {{ $product->pivot->amount }}x <a href="{{ url('/product/' . $product->id) }}">{{ $product->title }}</a> <span> - £{{ $price }}</span>
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
