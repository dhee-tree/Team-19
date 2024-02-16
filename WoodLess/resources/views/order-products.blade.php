@extends('layouts.base')
@section('title', 'WoodLess - My Orders')

@section('style')
<link rel="stylesheet" href="{{ asset('css/user-panel.css')}}">
<link rel="stylesheet" href="{{ asset('css/basket.css')}}">
@endsection

@section('content')
    <!-- Code for sidebar -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            <i class="fa-regular fa-circle-check fa-fade"></i> <span>{{ session('success') }}</span>
        </div>
    @endif
    <div class="wrapper">

        <aside id="sidebar">
            <div class="sidebar-list">
                <div class="heading">
                    <p>Hi, Welcome back to your account.</p>
                </div>
                <ul class="sidebar">
                    <li class="sidebar-item">
                    <a href="{{ route('user-panel') }}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                    <a href="{{ route('user.purchases') }}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            My Purchases
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/user-panel/tickets')}}" class="sidebar-link">
                            <i class="fa-regular fa-clipboard-list pe-2"></i>
                            Tickets
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('password.change.form') }}" class="sidebar-link">
                            <i class="fa-solid fa-lock" style="color: #e8e8e8;"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="sidebar-link"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket" style="color:#e8e8e8; margin-right:10px;"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main content -->
        <div class="main content">
            <!-- Code for banner -->
            <div class="banner">
                <h1>{{ $user->first_name }} Purchases</h1>
            </div> 

            <!-- Code for customers also bought carrousel -->
            <section id="" class="py-5 py-xl-8">
                <div class="container-fluid justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Order {{ $order->id }} Details</h5>
                                    @if ($order->status->status == 'Processing') 
                                        <span class="order-status order-status-processing order-small-width">{{ $order->status->status }}</span>
                                    @elseif ($order->status->status == 'Transit') 
                                        <span class="order-status order-status-transit order-small-width">{{ $order->status->status }}</span>
                                    @else 
                                        <span class="order-status order-status-completed order-small-width">{{ $order->status->status }}</span>
                                    @endif
                                    <p class="card-text">Order Date: {{ $order->created_at }}</p>                                   
                                    <p class="card-text">Total: £ {{ $order->products->sum('cost') }}</p>
                                    <p class="card-text">Delivery Address: {{ $address->house_number }} {{ $address->street_name }}, {{ $address->city }}. {{ $address->postcode }}</p>
                                    <hr>
                                    <p class="card-text">Items:</p>
                                    @if(session('status') == 'success')
                                        <div class="alert alert-success">
                                            <i class="fa-regular fa-circle-check"></i> <span>{{ session('message') }}</span>
                                        </div>
                                    @elseif (session('status') == 'error')
                                        <div class="alert alert-danger">
                                        <i class="fa-regular fa-circle-xmark"></i> <span>{{ session('message') }}</span>
                                        </div>
                                    @endif
                                    @foreach ($order->products as $product)
                                        <div class="row order-card">
                                            <div class="col-sm-6 mb-4">
                                                {{ $product->pivot->amount }}x
                                                @foreach (json_decode($product->pivot->attributes) as $key => $value)
                                                    @if ($key == "colour") 
                                                        <div class="colour-square" style="background-color: {{ $value }};"></div>
                                                {{ $product->title }}                                                    
                                                    <a href="{{ url('/product/' . $product->id) }}"><img src="{{ asset('images/' . explode(',', $product->images)[0]) }}" alt="..." width="40" height="40"></a>
                                                    @else
                                                        <p>{{ $key }}: {{ $value }}</p>
                                                    @endif
                                                @endforeach


                                            </div>
                                            <div class="col-sm-3">
                                                <p>£{{ $product->cost }}</p>
                                            </div>
                                            <div class="col-sm-3">
                                                @if ($product->orderProductStatus->first()->status == 'Complete') 
                                                    <a href="{{ route('user.return-purchase', ['order' => $order->id, 'product' => $product->id]) }}" class="btn btn-primary">Return Product</a>
                                                @else
                                                    <span class="order-status order-status-processing order-small-width btn btn-warning disabled">{{ $product->orderProductStatus->first()->status }}</span>
                                                    @if ($product->orderProductStatus->first()->status == 'Processing Return')
                                                        <a href="{{ route('user.cancel-return-purchase', ['order' => $order->id, 'product' => $product->id]) }}">
                                                            <i class="fa-solid fa-circle-xmark btn" style="color: #ff0000;" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel return"></i>
                                                        </a> 
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <div class="card-footer">
                                    <a href="{{ route('user.purchases') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/user-panel.js') }}"></script>
@endsection