//Main page js
const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .fa-solid.fa-bars');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .fa-solid');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
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
