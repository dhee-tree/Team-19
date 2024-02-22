@extends('layouts.user-panel-base')
@section('title', 'Purchases')

@section('main')
          <!-- Main content -->
        <div class="main content">
            <!-- Code for banner -->
            <div class="banner">
                <h1>{{ $user->first_name }}'s Purchases</h1>
            </div> 

            <!-- Code for customers also bought carrousel -->
            <section id="" class="py-5 py-xl-8">
                <div class="container-fluid justify-content-center">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Purchases</h5>
                                    <p class="card-text">Here are all your purchases</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Items</th>
                                                <th>Status</th>
                                                <th>Order Date</th>
                                                <th>View Order</th>
                                            </tr>
                                        </thead>
                                        @foreach ($orders as $order)
                                            <tbody>
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->products->sum('pivot.amount') }}</td>                                                    
                                                    @if ($order->status->status == 'Processing') 
                                                        <td class="order-status order-status-processing">{{ $order->status->status }}</td>
                                                    @elseif ($order->status->status == 'Transit') 
                                                        <td class="order-status order-status-transit">{{ $order->status->status }}</td>
                                                    @else 
                                                        <td class="order-status order-status-completed">{{ $order->status->status }}</td>
                                                    @endif
                                                    <td>{{ $order->created_at }}</td>
                                                    <td><a href="{{ route('user.view-purchase', $order->id) }}" class="btn btn-primary">View</a></td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('user-panel') }}" class="btn btn-primary">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endsection