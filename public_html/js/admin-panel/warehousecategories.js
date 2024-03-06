$(document).ready(function () {
    $('.warehouse-row').click(function () {
        var id = $(this).find('td:first-child').text(); // Get the ticket ID from the first column

        $.get('/admin-panel/misc/category-info/' + id, function (data) {
            $('body').append(data);
            var modal = $('#infoModal');
            modal.modal('show'); // Show the modal after content is appended

            // Remove the modal from the DOM when it's closed
            modal.on('hidden.bs.modal', function () {

                modal.remove();
            });
        });

    });
});

$(document).ready(function () {
    $('.categories-row').click(function () {
        var id = $(this).find('td:first-child').text(); // Get the ticket ID from the first column

        $.get('/admin-panel/misc/warehouse-info/' + id, function (data) {
            $('body').append(data);
            var modal = $('#infoModal');
            modal.modal('show'); // Show the modal after content is appended

            // Remove the modal from the DOM when it's closed
            modal.on('hidden.bs.modal', function () {

                modal.remove();
            });
        });

    });
});