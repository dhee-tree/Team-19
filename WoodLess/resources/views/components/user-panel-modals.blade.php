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