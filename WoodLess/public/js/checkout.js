function paymentChoice( method ) {
    if (method == "paypal") {
        document.getElementById("choice-paypal").style.display = "block";
    } else {
        document.getElementById("paymentMethod").innerHTML = "Card";
    }
}