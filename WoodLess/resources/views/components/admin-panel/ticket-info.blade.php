<div id="infoModals">

    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">
        <!-- Is responsible for expanding the fields for the item in the inventory managment system -->

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="extraModalLabel">Ticket Details</h5>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="text-center mb-4">
                        <!-- Display the user ID underneath the image with margin -->
                        <p class="mt-3 mb-0">Ticket ID: {{ $ticket->id }}</p>
                        <!-- Display the role underneath the image without a title -->
                        <h5 id="importanceText"><strong>Importance:
                                {{ $ticket->importance_level_id ? $ticket->importanceLevel->level : 'None' }}</strong>
                        </h5>
                    </div>
                    <!-- Thin line -->
                    <hr>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Contact</strong><br>{{ $ticket->contact }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Status</strong><br>
                                @if ($ticket->status == '1')
                                    Open
                                @elseif ($ticket->status == '2')
                                    In Progress
                                @else
                                    Resolved
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Created At</strong><br>{{ $ticket->created_at }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Updated At</strong><br>{{ $ticket->updated_at }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <p><strong>Title</strong><br>{{ $ticket->title }}</p>
                    </div>
                    <div class="row">
                        <p><strong>Message</strong><br>{{ $ticket->information }}</p>
                    </div>
                </div>
                <div class="modal-footer">

                    <div class="container">
                        <div class="row">
                            <div class="col justify-content-left">
                                @if ($ticket->admin_id == auth()->user()->id && $ticket->status == 1)
                                    <div class="d-inline-block">
                                        <form method="POST"
                                            action="{{ secure_url(route('admin.ticket-resolve', ['id' => $ticket->id])) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary me-2">Set In Progress</button>
                                        </form>
                                    </div>
                                @elseif ($ticket->admin_id == auth()->user()->id && $ticket->status == 2)
                                    <div class="d-inline-block">
                                        <form method="POST"
                                            action="{{ secure_url(route('admin.ticket-resolve', ['id' => $ticket->id])) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary me-2">End Ticket</button>
                                        </form>
                                    </div>
                                @elseif ($ticket->admin_id == auth()->user()->id && $ticket->status == 3)
                                    <button type="submit" class="btn btn-primary me-2" disabled>Resolved</button>
                                @else
                                    <div class="d-inline-block">
                                        <form id="claimTicket"
                                            action="{{ secure_url(route('ticket-claim', ['id' => $ticket->id])) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary me-2">Claim</button>
                                        </form>
                                    </div>
                                @endif
                                <button class="btn btn-warning me-2" disabled>Claimed</button>
                                <!-- Button to trigger modal -->
                                <button type="button" class="btn btn-danger me-2" data-bs-toggle="modal"
                                    data-bs-target="#confirmDeleteModal" id="openModalButton"
                                    onclick="DeleteItemId({{ $ticket->id }})">Delete</button>
                            </div>

                            <div class="col-auto order-lg-last">

                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning dropdown-toggle me-2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Importance Level
                                    </button>
                                    <ul class="dropdown-menu">
                                        @foreach ($importance_levels as $level)
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="updateImportance({{ $ticket->id }}, '{{ $level->id }}')">
                                                    {{ $level->level }}</a></li>
                                        @endforeach
                                    </ul>

                                </div>

                                <button type="button" id="btn-close" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
