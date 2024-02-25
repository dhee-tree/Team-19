document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('search');
    var productRows = document.querySelectorAll('.user-row');

    // Event listener for changes in the search input
    searchInput.addEventListener('input', function () {
        var searchQuery = searchInput.value.trim().toLowerCase();

        // Iterate over product rows to filter products
        productRows.forEach(function (row) {
            var id = row.querySelector('.id').textContent.trim().toLowerCase();
            var first = row.querySelector('.first').textContent.trim().toLowerCase();
            var last = row.querySelector('.last').textContent.trim().toLowerCase();
            var email = row.querySelector('.email').textContent.trim().toLowerCase();
            var phone = row.querySelector('.phone').textContent.trim().toLowerCase();

            var matchId = id.includes(searchQuery);
            var matchFirst = first.includes(searchQuery);
            var matchLast = last.includes(searchQuery);
            var matchEmail = email.includes(searchQuery);
            var matchPhone = phone.includes(searchQuery);

            // Show or hide the product row based on search query
            // You may need to adjust this logic depending on your specific requirements
            row.style.display = matchId || matchFirst || matchLast || matchEmail || matchPhone ? 'table-row' : 'none';
        });

    });
});


function openInfoModal(userId) {
    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.querySelectorAll(".openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/users/user-info/' + userId, function (data) {
        $('body').append(data);
        var modal = $('#ExtraModal');
        var container = $('#ExtraModals');
        modal.modal('show'); // Show the modal after content is appended

        // Flag to determine if the ExtraModal was explicitly closed by the user
        var extraModalClosed = false;


        // Set the flag when the close button on the ExtraModal is clicked
        modal.find('#btn-close').on('click', function () {
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
    document.getElementById('deleteForm').action = '/admin-panel/users/delete/' + Id;

}

//JavaScript to handle add/create modal opening
function openAddModal() {
    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.querySelectorAll(".openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/users/user-add/', function (data) {
        $('body').append(data);
        var modal = $('#extraModal');
        modal.modal('show'); // Show the modal after content is appended

        // Remove the modal from the DOM when it's closed
        modal.on('hidden.bs.modal', function () {
            // Re-enable all buttons with the specified class when the modal is closed
            var buttons = document.querySelectorAll(".openModalButton");
            for (var i = 0; i < buttons.length; i++) {
                buttons[i].disabled = false;
            }

            modal.remove();
        });
    });
}

//JavaScript to handle edit modal opening

function openEditModal(userId) {

    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.getElementsByClassName("openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/users/user-edit/' + userId, function (data) {
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