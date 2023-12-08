function paymentChoice( method ) {
    document.getElementById("payment-card").style.display = "block";  // Show the payment section
    if (method == "paypal") { // If the user choose paypal
        document.getElementById("choice-card").style.display = "none";  // Hide the card section
        document.getElementById("choice-paypal").style.display = "block";  // Show the paypal section
    } else {  // If the user choose card
        document.getElementById("choice-paypal").style.display = "none";  // Hide the paypal section
        document.getElementById("choice-card").style.display = "block";  // Show the card section
    }
}

document.getElementById("changePaypal").style.display = "none";  // Always hide the change paypal link
function paypalLogin(method) {
    var paypalForm = document.getElementById("paypalForm");  // Get the paypal form
    var paypalLogin = document.getElementById("paypalLogin");  // Get the paypal login link
    if (method == "paypal") {  // If the user clicks login with paypal
        paypalForm.disabled = true;  // Disable the paypal form
        paypalLogin.style.display = "none";  // Hide the paypal login link
        document.getElementById("changePaypal").style.display = "block";  // Show the paypal login link
    } else { // If the user clicks change paypal account
        document.getElementById("paypalLogin").style.display = "block";  // Show the paypal login link
        document.getElementById("changePaypal").style.display = "none";  // Hide the change paypal link
        document.getElementById("paypalForm").disabled = false;  // Enable the paypal form
    }
}

function onlyNumbers(event) {
    var input = event.target; // Get the input element
    input.value = input.value.replace(/\D/g, ''); // Remove all non-numeric characters
}
