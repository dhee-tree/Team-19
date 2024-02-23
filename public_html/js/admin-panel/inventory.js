document.addEventListener('DOMContentLoaded', function() {
    var searchInput = document.getElementById('search');
    var productRows = document.querySelectorAll('.product-row');

    // Event listener for changes in the search input
    searchInput.addEventListener('input', function() {
        var searchQuery = searchInput.value.trim().toLowerCase();

        // Iterate over product rows to filter products
        productRows.forEach(function(row) {
            var title = row.querySelector('.title').textContent.trim().toLowerCase();
            var description = row.querySelector('.description').textContent.trim()
                .toLowerCase();
            var matchTitle = title.includes(searchQuery);
            var matchDescription = description.includes(searchQuery);

            // Show or hide the product row based on search query
            row.style.display = matchTitle || matchDescription ? 'table-row' : 'none';
        });
    });
});

//Delete item modal info handlers
function DeleteItemId(Id) {
    document.getElementById('id_input').value = Id;
    document.getElementById('deleteForm').action = '/admin-panel/inventory/delete/' + Id;

}


//JavaScript to handle info modal opening

function openInfoModal(productId) {
    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.querySelectorAll(".openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/inventory/product-info/' + productId, function (data) {
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

function openEditModal(productId) {

    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.getElementsByClassName("openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/inventory/product-edit/' + productId, function (data) {
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


//JavaScript to handle add/create modal opening

function openAddModal(productId) {
    // Disable all buttons with the specified class to disable multiple spam
    var buttons = document.querySelectorAll(".openModalButton");
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = true;
    }

    $.get('/admin-panel/inventory/product-add/', function (data) {
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
