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
                                @if ($tickets != null) 
                                    @foreach ($tickets as $ticket)
                                        <tbody>
                                            <tr>
                                                <td>{{ $ticket->title }}</td>
                                                <td>{{ $ticket->information }}</td>                                                    
                                                @if ($ticket->status == '1') 
                                                    <td class="order-status order-status-processing">Open</td>
                                                @elseif ($ticket->status->status == '2') 
                                                    <td class="order-status order-status-transit">In Progress</td>
                                                @else 
                                                    <td class="order-status order-status-completed">Resolved</td>
                                                @endif
                                                <td>{{ $ticket->created_at }}</td>
                                                <td><a href="{{ route('user.tickets.view', $ticket->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewTicketModal"><i class="fa-solid fa-eye"></i> View Ticket</a></td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                @else
                                    <tbody>
                                        <tr>
                                            <td colspan="5">No tickets found</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTicketModal"><i class="fa-solid fa-file-pen"></i> Create Ticket</button>
                        </div>

                        <!-- This include user panel modal -->
                        @include('components.user-panel-modals')
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    @endsection
@endsection