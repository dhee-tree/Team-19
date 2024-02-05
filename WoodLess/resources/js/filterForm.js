
// Simulate a GET request using JavaScript
document.getElementById('exampleForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Get form data
    var formData = new FormData(this);

    // Convert form data to query string
    var queryString = new URLSearchParams(formData).toString();

    // Send GET request
    var endpoint = '/form-endpoint?' + queryString;


});
