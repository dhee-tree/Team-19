$(document).ready(function () {
    $('.order-row').click(function () {
        var orderId = $(this).find('td:first-child').text(); // Get the ticket ID from the first column

        $.get('/admin-panel/orders/info/' + orderId, function (data) {
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