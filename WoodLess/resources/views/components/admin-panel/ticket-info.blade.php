<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">
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
                    <h5><strong>Importance:
                            {{ $ticket->importance_level_id ? $ticket->importanceLevel->level : 'None' }}</strong></h5>
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
                <button type="button" id="btn-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <p>{{ $ticket->user_id }}</p>
                <p>{{ $ticket->admin_id }}</p>
            </div>
        </div>
    </div>
</div>
