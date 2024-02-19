document.addEventListener('DOMContentLoaded', function () {
    var successAlert = document.getElementById('successAlert');

    if (successAlert) {
        // Show the alert
        successAlert.style.display = 'block';

        // Hide the alert after 5 seconds (adjust as needed)
        setTimeout(function () {
            successAlert.style.display = 'none';
        }, 5000); // 5000 milliseconds = 5 seconds

        // Close the alert when the close button is clicked
        var closeButton = successAlert.querySelector('.btn-close');
        if (closeButton) {
            closeButton.addEventListener('click', function () {
                successAlert.style.display = 'none';
            });
        }
    }
});
