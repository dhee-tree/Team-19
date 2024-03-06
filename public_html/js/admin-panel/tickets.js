document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search');
    var ticketsRow = document.querySelectorAll('.ticket-row');

    // Event listener for changes in the search input
    searchInput.addEventListener('input', function () {
        var searchQuery = searchInput.value.trim().toLowerCase();
        ticketsRow.forEach(function (row) {
            var id = row.querySelector('.id').textContent.trim().toLowerCase();
            var title = row.querySelector('.title').textContent.trim().toLowerCase();
            var information = row.querySelector('.information').textContent.trim().toLowerCase();
            var created = row.querySelector('.created').textContent.trim().toLowerCase();
            var user = row.querySelector('.user').textContent.trim().toLowerCase();
            var admin = row.querySelector('.admin').textContent.trim().toLowerCase();
            var status = row.querySelector('.status').textContent.trim().toLowerCase();

            // Check if any of the row's content matches the search query
            var matchId = id.includes(searchQuery);
            var matchTitle = title.includes(searchQuery);
            var matchInformation = information.includes(searchQuery);
            var matchCreated = created.includes(searchQuery);
            var matchUser = user.includes(searchQuery);
            var matchAdmin = admin.includes(searchQuery);
            var matchStatus = status.includes(searchQuery);

            // Show or hide the product row based on search query
            // You may need to adjust this logic depending on your specific requirements
            row.style.display = matchId || matchTitle || matchInformation || matchCreated || matchUser || matchAdmin || matchStatus ? 'table-row' : 'none';
        });

    });
});


function openUserInfoModal(userId) {

    $.get('/admin-panel/tickets/user-info/' + userId, function (data) {
        $('body').append(data);
        var modal = $('#ExtraModal');
        var container = $('#ExtraModals');
        modal.modal('show'); // Show the modal after content is appended

        // Flag to determine if the ExtraModal was explicitly closed by the user
        var extraModalClosed = false;


        // Set the flag when any close button inside the modal is clicked
        var closeButtons = modal.find('[id="btn-close"]');
        closeButtons.each(function () {
            $(this).on('click', function () {


                container.remove();

                // Get the modal backdrop element
                var backdrop = document.querySelector('.modal-backdrop');

                // Check if the backdrop element exists
                if (backdrop) {
                    // Remove the backdrop element from the DOM
                    backdrop.parentNode.removeChild(backdrop);
                }
            });
        });
        // Event listener for clicking outside the modal
        container.on('click', function (e) {
            // Check if the click is outside the modal and not on any elements within the modal

            if ($(e.target).hasClass('modal')) {


                container.remove();
                // Get the modal backdrop element
                var backdrop = document.querySelector('.modal-backdrop');

                // Check if the backdrop element exists
                if (backdrop) {
                    // Remove the backdrop element from the DOM
                    backdrop.parentNode.removeChild(backdrop);
                }
            }
        });
    });


}

//Delete item modal info handlers
function DeleteItemId(Id) {
    document.getElementById('id_input').value = Id;
    document.getElementById('deleteForm').action = '/admin-panel/tickets/delete/' + Id;

}

//JavaScript to handle edit modal opening

function openImportanceLevel(userId) {

    $.get('/admin-panel/tickets/admin-resolve/' + userId, function (data) {
        $('body').append(data);
        var modal = $('#extraModal');
        modal.modal('show'); // Show the modal after content is appended

        // Remove the modal from the DOM when it's closed
        modal.on('hidden.bs.modal', function () {

            modal.remove();
        });
    });
}

//for pagination
document.addEventListener('DOMContentLoaded', function () {
    var lengthSelect = document.getElementById('length');

    // Event listener for changes in the select element
    lengthSelect.addEventListener('change', function () {
        // Get the selected value
        var selectedValue = lengthSelect.value;

        // Get the current page URL
        var currentPageUrl = window.location.href;

        // Check if there are existing query parameters
        var querySeparator = currentPageUrl.includes('?') ? '&' : '?';

        // Check if the URL already contains a length parameter
        if (currentPageUrl.includes('length=')) {
            // Replace the existing length parameter with the new value
            currentPageUrl = currentPageUrl.replace(/(length=)[^\&]+/, '$1' + selectedValue);
        } else {
            // Append the length parameter to the URL
            currentPageUrl += querySeparator + 'length=' + selectedValue;
        }

        // Reload the page with the updated URL
        window.location.href = currentPageUrl;
    });
});

function updateImportance(ticketId, importanceLevel) {
    var url = "/admin-panel/tickets/importance/" + ticketId + "/" + importanceLevel;

    $.ajax({
        url: url,
        type: "POST",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'), // Get the CSRF token from the meta tag
        },
        success: function (response) {
            // Update the content of the <h5> element with the new importance level
            $('#importanceText').html('<strong>Importance: ' + response.level + '</strong>');
            console.log(response);
        },
        error: function (xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
}




$(document).ready(function () {
    $('.ticket-row').click(function () {
        var ticketId = $(this).find('td:first-child').text(); // Get the ticket ID from the first column

        $.get('/admin-panel/tickets/info/' + ticketId, function (data) {
            $('body').append(data);
            var modal = $('#infoModal');
            var container = $('#infoModals');
            modal.modal('show'); // Show the modal after content is appended

            // Flag to determine if the ExtraModal was explicitly closed by the user
            var extraModalClosed = false;


            // Set the flag when any close button inside the modal is clicked
            var closeButtons = modal.find('[id="btn-close"]');
            closeButtons.each(function () {
                $(this).on('click', function () {

                    container.remove();

                    // Get the modal backdrop element
                    var backdrop = document.querySelector('.modal-backdrop');

                    // Check if the backdrop element exists
                    if (backdrop) {
                        // Remove the backdrop element from the DOM
                        backdrop.parentNode.removeChild(backdrop);
                    }
                });
            });

            // Event listener for clicking outside the modal
            container.on('click', function (e) {
                // Check if the click is outside the modal and not on any elements within the modal

                if ($(e.target).hasClass('modal')) {
                    container.remove();
                    // Get the modal backdrop element
                    var backdrop = document.querySelector('.modal-backdrop');

                    // Check if the backdrop element exists
                    if (backdrop) {
                        // Remove the backdrop element from the DOM
                        backdrop.parentNode.removeChild(backdrop);
                    }
                }
            });

            // Event listener for modal close event
            $('.modal').on('hidden.bs.modal', function (e) {
                var closedModalId = $(this).attr('id'); // Get the ID of the closed modal
                var parentContainer = $('#' + closedModalId).parent(); // Get the parent of the closed modal
                console.log(parentContainer.attr('id'));
                // Check if the parent of the closed modal is the container modal
                if (!parentContainer.is('#extraModals')) {
                    // The modal was closed outside of the container, handle it here
                    // For example, remove the container or perform other actions
                }
            });
        });


    });
});