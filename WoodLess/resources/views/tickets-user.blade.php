@extends('layouts.user-panel-base')
@section('title', 'Tickets')

@section('main')
    @section('banner')
        <!-- Code for banner -->
        <div class="banner">
            <h2>{{ $user->first_name }}'s Tickets</h2> 
        </div> 
    @endsection

    @section('page-content')
    <section id="" class="py-5 py-xl-8">
        <div class="container-fluid justify-content-center">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tickets</h5>
                            <p class="card-text">Here are all your tickets</p>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Information</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>View Ticket</th>
                                    </tr>
                                </thead>
                                @foreach ($tickets as $ticket)
                                    <tbody>
                                        <tr>
                                            <td>{{ $ticket->title }}</td>
                                            <td>{{ $ticket->information }}</td>                                                    
                                            @if ($ticket->status == '1') 
                                                <td class="order-status order-status-processing">{{ $ticket->status }}</td>
                                            @elseif ($ticket->status->status == '2') 
                                                <td class="order-status order-status-transit">{{ $ticket->status }}</td>
                                            @else 
                                                <td class="order-status order-status-completed">{{ $ticket->status }}</td>
                                            @endif
                                            <td>{{ $ticket->created_at }}</td>
                                            <td><a href="#" class="btn btn-primary">View</a></td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    @endsection
@endsection