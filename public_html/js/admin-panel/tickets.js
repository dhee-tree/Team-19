document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search');
    var ticketsRow = document.querySelectorAll('.tickets-row');

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
    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.querySelectorAll(".openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

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
                // Re-enable all buttons with the specified class when the modal is closed
                var buttons = document.querySelectorAll(".openModalButton");
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].disabled = false;
                }

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
                // Re-enable all buttons with the specified class when the modal is closed
                var buttons = document.querySelectorAll(".openModalButton");
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].disabled = false;
                }

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

function openResolveModal(userId) {

    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.getElementsByClassName("openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/tickets/admin-resolve/' + userId, function (data) {
        $('body').append(data);
        var modal = $('#extraModal');
        modal.modal('show'); // Show the modal after content is appended

        // Remove the modal from the DOM when it's closed
        modal.on('hidden.bs.modal', function () {
            // Re-enable all buttons with the specified class when the modal is closed
            var buttons = document.getElementsByClassName("openModalButton");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = false;
            }
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

$(document).ready(function() {
    $('.tickets-row').click(function() {
        var ticketId = $(this).find('td:first-child').text(); // Get the ticket ID from the first column
        console.log(ticketId);

        $.get('/admin-panel/tickets/info/' + ticketId, function (data) {
            $('body').append(data);
            var modal = $('#extraModal');
            modal.modal('show'); // Show the modal after content is appended
    
            // Remove the modal from the DOM when it's closed
            modal.on('hidden.bs.modal', function () {
                // Re-enable all buttons with the specified class when the modal is closed
                var buttons = document.getElementsByClassName("openModalButton");
                for (var i = 0; i < buttons.length; i++) {
                    buttons[i].disabled = false;
                }
                modal.remove();
            });
        });

    });
});
