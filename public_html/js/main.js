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

    document.addEventListener('DOMContentLoaded', function () {
        var closeButton = document.querySelector('.card-body-s .close');
        var cardBody = document.querySelector('.card-body-s');
        closeButton.addEventListener('click', function () {
            cardBody.style.display = 'none';


        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Get all forms on the page
    const forms = document.querySelectorAll('form');

    // Add a click event listener to each form
    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            // Disable all submit buttons within the form
            const submitButtons = form.querySelectorAll('button[type="submit"]');
            submitButtons.forEach(button => {
                button.disabled = true;
            });
        });
    });
});

