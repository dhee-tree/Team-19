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


// For delivery and billing address
var changeAddressLink = document.getElementById('changeDeliveryAddress'); // Get the change address link
changeAddressLink.style.display = "none"; // Hide the change address link
var confirmedAddressDiv = document.getElementById('confirmedAddressMessage'); // Get the address confirmation message
confirmedAddressDiv.style.display = "none"; // Hide the address confirmation message

function confirmDeliveryAddress() {
    document.getElementById('deliveryForm').classList.add('d-none'); // Hide the delivery form
    document.getElementById('deliveryConfirmation').classList.remove('d-none');
    confirmedAddressDiv.style.display = "block"; // Show the address confirmation message
    changeAddressLink.style.display = "inline-block"; // Show the change address link
    
}

function changeAddress(addressType) {
    if (addressType == "delivery") {
        document.getElementById('deliveryForm').classList.remove('d-none'); // Show the delivery form
        document.getElementById('deliveryConfirmation').classList.add('d-none'); // Hide the delivery confirmation
        confirmedAddressDiv.style.display = "none"; // Hide the address confirmation message
    } else if (addressType == "billing") {
        document.getElementById('billingForm').classList.remove('d-none'); // Show the billing form
        document.getElementById('billingConfirmation').classList.add('d-none'); // Hide the billing confirmation
    }
}

function confirmBillingAddress() {
    document.getElementById('billingForm').classList.add('d-none'); // Hide the billing form
    document.getElementById('billingConfirmation').classList.remove('d-none'); // Show the billing confirmation
    showDeliveryDetails('show'); // Show the delivery details
}

document.getElementById('sameAsDelivery').addEventListener('change', function () {
    if (this.checked) {
        document.getElementById('billingForm').classList.add('d-none'); // Hide the billing form
        showDeliveryDetails('show'); // Show the delivery details
        confirmBillingAddress(); // Show the billing confirmation
    } else {
        document.getElementById('billingForm').classList.remove('d-none'); // Show the billing form
        showDeliveryDetails('hide'); // Show the delivery details
        document.getElementById('billingConfirmation').classList.add('d-none'); // Hide the billing confirmation
    }
});

var deliveryDetails = document.getElementById('deliveryDetails'); // Get the delivery details div
deliveryDetails.style.display = "none"; // Hide the delivery details div by default

function showDeliveryDetails(status) {
    // Get the values from the form
    var address_line1 = document.getElementById('address_line1').value;
    var address_line2 = document.getElementById('address_line2').value;
    var city = document.getElementById('city').value;
    var postcode = document.getElementById('postcode').value;
    var country = document.getElementById('country').value;

    // Display the values in the delivery details div
    document.getElementById('deliveryAddress').innerHTML = address_line1 + "<br/>" + address_line2 + "<br/>" + city + "<br/>" + postcode + "<br/>" + country;
    if (status == "show") {
        deliveryDetails.style.display = "block";
    } else if (status == "hide") {
        deliveryDetails.style.display = "none";
    }
}
