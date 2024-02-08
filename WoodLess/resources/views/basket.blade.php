@extends('layouts.base')
@section('title', 'WoodLess - Your basket')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
@endsection 

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $basket->user->first_name }}'s Basket</h1>
                <hr>

                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if($basket->products->count() > 0)

                    <h2>You have {{ $basket->products->count() }} items in your basket</h2>

                    <div class="table-responsive"> 
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basket->products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{ 'images/'.explode(',', $product->images)[0] }}" alt="product image" width="60" height="60">
                                            <span>{{ $product->title }}</span>
                                            <br>
                                            @foreach(json_decode($product->pivot->attributes) as $key => $value)
                                                @if ($key == "colour") 
                                                   <span>Colour</span> <div class="colour-square" style="background-color: {{ $value }};"></div>
                                                @else
                                                    <span>{{ $key }}: {{ $value }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($product->discount > 0)
                                                <p><s>£{{ $product->cost }}</s></p>
                                                <?php $discountPrice = round($product->cost - ($product->cost * ($product->discount / 100)), 2) ?>
                                                <p>£{{ $discountPrice }}</p>
                                            @else
                                                <p>£{{ $product->cost }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            <p>Quantity: {{ $product->pivot->amount }}</p>
                                            <p>Total: £{{ $product->pivot->amount * $discountPrice }}</p>
                                            <form action="{{ route('basket.update', $basket) }}" method="POST">
                                                @csrf
                                                <input type="number" name="amount" value="{{ $product->pivot->amount }}" min="1" max="10">
                                                <input type="hidden" name="id" value="{{ $product->pivot->id }}">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td class="align-middle">
                                            <form action="{{ route('basket.destroy', $basket) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $product->pivot->id }}">
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <h2>Total cost: </h2>
                                        </td>
                                        <td colspan="2">
                                            <p>{{ $basket->totalCost() }}</p>
                                            
                                        </td>
                                        <td>
                                            <a href="/checkout" class="btn btn-success">Checkout</a>
                                        </td>
                                    </tr>
                        </table>
                    </div>
                @else
                    <div class="empty-basket">
                        <h2>Your basket is empty</h2>
                        Go to <a href="/products" class="btn btn-primary">Products</a> or
                        <a href="/categories" class="btn btn-success">Categories</a>
                    </div>
                @endif

            </div>  
        </div>  
    </div>  
@endsection

@section('js')
<!-- <script  rel= "jssheet" src="{{ asset('js/basket.js') }}"></script> -->
@endsection