document.addEventListener('DOMContentLoaded', function () {
    var successAlert = document.getElementById('successAlert');

    if (successAlert) {
        // Show the alert
        successAlert.style.display = 'block';

        // Hide the alert after 5 seconds (adjust as needed)
        setTimeout(function () {
            successAlert.classList.remove('show');
        }, 5000); // 5000 milliseconds = 5 seconds
    }
});
