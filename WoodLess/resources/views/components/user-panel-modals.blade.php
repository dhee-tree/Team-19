<!-- Create ticket modal -->
<div class="modal fade" id="createTicketModal" tabindex="-1" aria-labelledby="createTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createTicketModal">Create Ticket </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.tickets.store') }}" method="POST">
                    @csrf
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>

                    <label for="information">Information</label>
                    <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- View ticket modal -->
<div class="modal fade" id="viewTicketModal" tabindex="-1" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="viewTicketModalLabel">Ticket Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                @if ($tickets != null)
                    <strong><p>Title:</p></strong>
                    <p>{{ $ticket->title }}</p>

                    <strong><p>Information:</p></strong>
                    <p>{{ $ticket->information }}</p>

                    <strong><p>Status:</p></strong>
                    @if ($ticket->status == '1') 
                        <p>Open</p>
                    @elseif ($ticket->status == '2')
                        <p>In Progress</p>
                    @else
                        <p>Resolved</p>
                    @endif

                    <strong><p>Created At:</p></strong>
                    <p>{{ $ticket->created_at }}</p>
                @else
                    <p>No ticket found</p>
                @endif
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
