<div id="choice-paypal">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Your are paying with PayPal</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h5>Enter your email to login to PayPal: </h5>
                <input type="email" name="" id="paypalForm" class="form-control"> 
                <a href="#payment-option" id="paypalLogin" onClick="paypalLogin('paypal');">Login</a>
                <a href="#payment-option" id="changePaypal" onClick="paypalLogin('card');">Change PayPal Account</a>
            </div>
        </div>
    </div>
</div>
    
<div id="choice-card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4>Your are paying by Card</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h5>Cardholder Name: </h5>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
                <h5>Card Number: </h5>
                <input type="text" name="" id="" class="form-control"  maxlength="16" oninput="onlyNumbers(event)">
            </div>
            <div class="col-md-2">
                <h5>Expiry Date: </h5>
                <input type="text" name="" id="" class="form-control" placeholder="MMYY" pattern="\d{2}/\d{2}" maxlength="4" oninput="onlyNumbers(event)">
            </div>
            <div class="col-md-2">
                <h5>CVV: </h5>
                <input type="text" name="" id="" class="form-control" placeholder="000" maxlength="3" oninput="onlyNumbers(event)">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <h5>Cardholder Address: </h5>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="col-md-3">
                <h5>Cardholder City: </h5>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <h5>Cardholder Country: </h5>
                <input type="text" name="" id="" class="form-control">
            </div>
            <div class="col-md-3">
                <h5>Cardholder Postcode: </h5>
                <input type="text" name="" id="" class="form-control">
            </div>
                
        </div>
    </div>
</div>