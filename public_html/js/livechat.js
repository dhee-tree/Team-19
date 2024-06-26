document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.querySelector('.card-body-s .close');
    var cardBody = document.querySelector('.card-body-s');
    closeButton.addEventListener('click', function () {
        cardBody.style.display = 'none';


    });


});

function disablePreviousChat(chat) {
    if (chat) {
      
        // Prevents pointer events like clicks
        chat.style.pointerEvents = 'none'; 
        chat.style.color = 'white';
          // Change text color to grey to indicate disabled state
        chat.style.backgroundColor = 'grey';
        chat.style.border = 'none';  
    } else {
        console.error("Invalid chat element provided.");
    }
}

function showChat(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    user_chat_height = document.getElementById(chat).clientHeight; // Get the height of the user chat

    if (chat == "order-button") {
        // Turn off other buttons of same category
        var product = document.getElementById("product-button");
        product.style.display = 'none';
        var return1 = document.getElementById("return-button");
        return1.style.display = 'none';

        // Show AI response with a delay
        var order = document.getElementById("order");
        var loader = document.getElementById("chat-loader");
        loader.style.display = 'block';
        setTimeout(function() {
            loader.style.display = 'none';
            order.style.marginTop = user_chat_height + 10 + 'px';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        // Get next user option for order
        var order_chat_1 = document.getElementById("order-chat-1");
        var order_chat_2 = document.getElementById("order-chat-2");
        var order_chat_3 = document.getElementById("order-chat-3");
        var order_chat_4 = document.getElementById("order-chat-4");
        
        // Add a delay and show the next user option
        setTimeout(function() {
            var ai_chat_height = order.clientHeight;
            order_chat_1.style.marginTop = ai_chat_height + 40 + 'px';
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_3.style.display = 'block';
            order_chat_4.style.display = 'block';
        }, 2500);
    } 
    else if (chat == "product-button") {
        // Add top margin to the product chat
        document.getElementById(chat).style.marginTop = '40px';
    
        // Turn off other buttons of same category
        var order = document.getElementById("order-button");
        order.style.display = 'none';
        var return1 = document.getElementById("return-button");
        return1.style.display = 'none';
    
        // Show AI response with a delay
        var product = document.getElementById("product-chat");
        var loader = document.getElementById("chat-loader");
        loader.style.display = 'block';
    
        setTimeout(function() {
            loader.style.display = 'none';
            product.style.marginTop = user_chat_height + 10 + 'px';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Get next user option for product
        var product_chat_1 = document.getElementById("product-chat-1");
        var product_chat_2 = document.getElementById("product-chat-2");
        var product_chat_3 = document.getElementById("product-chat-3");
        var product_chat_4 = document.getElementById("product-chat-4");
        
        //  Add a delay and show the next user option
        setTimeout(function() {
            var ai_chat_height = product.clientHeight;
            product_chat_1.style.marginTop = ai_chat_height + 40 + 'px';
            product_chat_1.style.display = 'block';
            product_chat_2.style.display = 'block';
            product_chat_3.style.display = 'block';
            product_chat_4.style.display = 'block';
        }, 2500);
    }
    
    else {
        // Add top margin to the return chat
        document.getElementById(chat).style.marginTop = '40px';
    
        // Turn off other buttons of same category
        var order = document.getElementById("order-button");
        order.style.display = 'none';
        var product = document.getElementById("product-button");
        product.style.display = 'none';
    
        // Show AI response with a delay
        var return1 = document.getElementById("return");
        var loader = document.getElementById("chat-loader");
        loader.style.display = 'block';
        setTimeout(function() {
            loader.style.display = 'none';
            return1.style.marginTop = user_chat_height + 10 + 'px';
            return1.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
        
        // Get next user option for return
        var return_chat_1 = document.getElementById("return-chat-1");
        var return_chat_2 = document.getElementById("return-chat-2");
        var return_chat_3 = document.getElementById("return-chat-3");
        var return_chat_4 = document.getElementById("return-chat-4");
        
        // Add a delay and show the next user option
        setTimeout(function() {
            var ai_chat_height = return1.clientHeight;
            return_chat_1.style.marginTop = ai_chat_height + 40 + 'px';
            return_chat_1.style.display = 'block';
            return_chat_2.style.display = 'block';
            return_chat_3.style.display = 'block';
            return_chat_4.style.display = 'block';
        }, 2500);
    }
    
}    

function showSecondOrderChat(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    user_chat_height = document.getElementById(chat).clientHeight; // Get the height of the user chat

    if (chat === "order-chat-1") {
        // Turn off other buttons of same category
        var product = document.getElementById("order-chat-2");
        product.style.display = 'none';
        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';

        // Show AI response with a delay
        var order = document.getElementById("order-response-1");
        var loader = document.getElementById("chat-loader");
         // Calculate the height of the user chat
         loader.style.display = 'block';
         order.insertAdjacentElement('afterend', loader);
         loader.style.marginTop = '10px';
   
    
        setTimeout(function() {
            loader.style.display = 'none';
            order.style.marginBlockStart = user_chat_height + 30 + 'px';
            order.style.display = 'block';
            
        }, 2000); // 2000 milliseconds = 2 seconds


        // Get next user option for order
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");

        // Add a delay and show the next user option
        setTimeout(function() {
            ai_chat_height = order.clientHeight;
            order_chat_1.style.marginTop = ai_chat_height + 30 + 'px';
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
        }, 2500);

    } else if (chat === "order-chat-2") {
        // Get the height of order-response-1
        var order_response_1 = document.getElementById("order-response-1");
        var order_response_1_height = order_response_1.clientHeight;
        
        // Add margin-top to chat
        var order_chat_2 = document.getElementById("order-chat-2");
        order_chat_2.style.marginTop = order_response_1_height + 30 + 'px';
    
        // Turn off other buttons of the same category
        var order = document.getElementById("order-chat-1");
        order.style.display = 'none';
        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';
    
        // Show AI response with a delay
        var product = document.getElementById("order-response-2");
        var loader = document.getElementById("chat-loader");
        product.insertAdjacentElement('afterend', loader);
        loader.style.display = 'block';
    
        setTimeout(function() {
            loader.style.display = 'none';
            product.style.marginTop = user_chat_height + 30 + 'px';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Get next user option for order
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");
    
        // Add a delay and show the next user option
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    }
    
    
    else if (chat === "order-chat-3") {
        // Get the element for the AI response
        var order = document.getElementById("order-response-3");
        var product = document.getElementById("order-response-3");
        
        // Display the AI response
        product.style.display = 'block';
    
        // Show next user options
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");
        var loader = document.getElementById("chat-loader");
    
        // Add margin-top to loader
        product.insertAdjacentElement('afterend', loader);
        loader.style.display = 'block';
    
        // Set a timeout to calculate height, hide the loader, and display user options after a delay
        setTimeout(function() {
            // Calculate the height of the AI response
            var productHeight = product.clientHeight;
            // Calculate the margin-top for the loader
            var loaderMargin = productHeight + 10 + 'px';
            loader.style.marginTop = loaderMargin;
            
            // Hide the loader
            loader.style.display = 'none';
    
            // Display user options with adjusted margin-top
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = (productHeight + 120) + 'px';
        }, 2500);
    
        // Hide other buttons of the same category
        var order = document.getElementById("order-chat-1");
        order.style.display = 'none';
        var return1 = document.getElementById("order-chat-2");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';
    }
    
    
    
    else{
        var shush = document.getElementById("order-response-4");
        var loader = document.getElementById("chat-loader");
        shush.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
        setTimeout(function() {
            shush.style.display = 'block';
            loader.style.display = 'none';
        }, 2000);
        var product = document.getElementById("order-chat-2");
        product.style.display = 'none';

        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var order = document.getElementById("order-chat-1");
        order.style.display = 'none';
        var form_response = document.getElementById("form-response");
        setTimeout(function() {
            form_response.style.display = 'block';
        }, 2100); // 2000 milliseconds = 2 seconds
    }
}
      

function showSecondOrderChat2(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    user_chat_height = document.getElementById(chat).clientHeight;

    if (chat === "order-chat-5") { // yes
        var order = document.getElementById("order-response-5");
        // use the chat variable to get the chat element
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
        setTimeout(function() {
            order.style.marginTop = user_chat_height + 30 + 'px';
            order.style.display = 'block';
            loader.style.display = 'none';
        }, 2000); // 2000 milliseconds = 2 seconds
        
        // Turn off other buttons of same category
        var product = document.getElementById("order-chat-6");
        product.style.display = 'none';
    } else {  // no
        // Add margin-top to no button.
        var no_button = document.getElementById("order-chat-6");
        no_button.style.marginTop = '180px';

        // Turn off other buttons of same category
        var yes_button = document.getElementById("order-chat-5");
        yes_button.style.display = 'none';

        var order = document.getElementById("order-response-6");
        var form_response = document.getElementById("form-response");
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
        // Show the AI response with a delay
        setTimeout(function() {
            order.style.marginTop = user_chat_height + 30 + 'px';
            order.style.display = 'block';
            loader.style.display = 'none';
        }, 2000); // 2000 milliseconds = 2 seconds


        // Show the form response with a delay
        setTimeout(function() {
            form_response.style.display = 'block';
        }, 2100); // 2000 milliseconds = 2 seconds

    }
}



function showSecondProductChat(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);

    if (chat === "product-chat-1") {
        var order = document.getElementById("product-response-1");
        
        // Show loader
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';

        setTimeout(function() {
            // Hide loader and display AI response
            loader.style.display = 'none';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("product-chat-2");
        product.style.display = 'none';

        var return1 = document.getElementById("product-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("product-chat-4");
        shush.style.display = 'none';

        // Show next user option
        var order_chat_1 = document.getElementById("product-chat-5");
        var order_chat_2 = document.getElementById("product-chat-6");

        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    }


    else if (chat === "product-chat-2") {
        var product = document.getElementById("product-response-2");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        product.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            // Hide loader and display AI response
            loader.style.display = 'none';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Show next user option
        var order_chat_1 = document.getElementById("product-chat-5");
        var order_chat_2 = document.getElementById("product-chat-6");
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    
        var order = document.getElementById("product-chat-1");
        order.style.display = 'none';
    
        var return1 = document.getElementById("product-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("product-chat-4");
        shush.style.display = 'none';
    }
    
    else if (chat === "product-chat-3") {
        var product = document.getElementById("product-response-3");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        product.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            // Hide loader and display AI response
            loader.style.display = 'none';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Show next user option
        var order_chat_1 = document.getElementById("product-chat-5");
        var order_chat_2 = document.getElementById("product-chat-6");
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    
        var order = document.getElementById("product-chat-1");
        order.style.display = 'none';
    
        var return1 = document.getElementById("product-chat-2");
        return1.style.display = 'none';
        var shush = document.getElementById("product-chat-4");
        shush.style.display = 'none';
    }
    
    else {
        var shush = document.getElementById("product-response-4");
        var form_response = document.getElementById("form-response");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        shush.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            // Hide loader and display AI response and form response
            loader.style.display = 'none';
            shush.style.display = 'block';
            form_response.style.display = 'block';
        }, 2500); // 2500 milliseconds = 2.5 seconds
    
        var product = document.getElementById("product-chat-2");
        var return1 = document.getElementById("product-chat-3");
        var order = document.getElementById("product-chat-1");
    
        product.style.display = 'none';
        return1.style.display = 'none';
        order.style.display = 'none';
    }
    
}
function showSecondProductChat2(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    if (chat === "product-chat-5") { // yes
        var order = document.getElementById("product-response-5");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            // Hide loader and display AI response
            loader.style.display = 'none';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        var product = document.getElementById("product-chat-6");
        product.style.display = 'none';
    }
    else { // no
        var order = document.getElementById("product-response-6");
        var form_response = document.getElementById("form-response");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            // Hide loader and display AI response
            loader.style.display = 'none';
            order.style.display = 'block';
            form_response.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        var product = document.getElementById("product-chat-5");
        product.style.display = 'none';
    }
}    
function showSecondReturnChat(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    user_chat_height = document.getElementById(chat).clientHeight; // Get the height of the user chat

     if (chat === "return-chat-1") {
        // Turn off other buttons of the same category
        var product = document.getElementById("return-chat-2");
        product.style.display = 'none';
        var return1 = document.getElementById("return-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("return-chat-4");
        shush.style.display = 'none';
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        var order = document.getElementById("return-response-1");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        // Show AI response with a delay
        setTimeout(function() {
            loader.style.display = 'none';
            order.style.marginBlockStart = user_chat_height + 30 + 'px';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Get next user option for return
        var return_chat_1 = document.getElementById("return-chat-5");
        var return_chat_2 = document.getElementById("return-chat-6");
    
        // Add a delay and show the next user option
        setTimeout(function() {
            ai_chat_height = order.clientHeight;
            return_chat_1.style.marginTop = ai_chat_height + 30 + 'px';
            return_chat_1.style.display = 'block';
            return_chat_2.style.display = 'block';
        }, 2500);
    }
    
    else if (chat === "return-chat-2") {
        // Geth height of return-response-1
        var return_response_1 = document.getElementById("return-response-1");
        var return_response_1_height = return_response_1.clientHeight;
        // Add margin-top to chat
        var return_chat_2 = document.getElementById("return-chat-2");
        return_chat_2.style.marginTop = return_response_1_height + 30 + 'px';
        
        // Turn off other buttons of the same category
        var order = document.getElementById("return-chat-1");
        order.style.display = 'none';
        var return1 = document.getElementById("return-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("return-chat-4");
        shush.style.display = 'none';
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        var product = document.getElementById("return-response-2");
        product.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        // Show AI response with a delay
        setTimeout(function() {
            loader.style.display = 'none';
            product.style.marginTop = user_chat_height + 30 + 'px';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Get next user option for return
        var return_chat_1 = document.getElementById("return-chat-5");
        var return_chat_2 = document.getElementById("return-chat-6");
    
        // Add a delay and show the next user option
        setTimeout(function() {
            return_chat_1.style.display = 'block';
            return_chat_2.style.display = 'block';
            return_chat_1.style.marginTop = '120px';
        }, 2500);
    }
    
    else if (chat === "return-chat-3") {
        var order = document.getElementById("return-response-3");
        var product = document.getElementById("return-response-3");
    
        // Show loader
        var loader = document.getElementById("chat-loader");
        product.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        // Show AI response with a delay
        setTimeout(function() {
            loader.style.display = 'none';
            product.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Show next user option
        var return_chat_1 = document.getElementById("return-chat-5");
        var return_chat_2 = document.getElementById("return-chat-6");
    
        setTimeout(function() {
            return_chat_1.style.display = 'block';
            return_chat_2.style.display = 'block';
            return_chat_1.style.marginTop = '120px';
        }, 2500);
    
        var order = document.getElementById("return-chat-1");
        order.style.display = 'none';
    
        var return1 = document.getElementById("return-chat-2");
        return1.style.display = 'none';
        var shush = document.getElementById("return-chat-4");
        shush.style.display = 'none';
    }
    
    else {
        var shush = document.getElementById("return-response-4");
        var form_response = document.getElementById("form-response");
        // Show loader
        var loader = document.getElementById("chat-loader");
        shush.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            loader.style.display = 'none';
            shush.style.display = 'block';
            form_response.style.display = 'block';
        }, 2500);
    
        var product = document.getElementById("return-chat-2");
        product.style.display = 'none';
    
        var return1 = document.getElementById("return-chat-3");
        return1.style.display = 'none';
    
        var order = document.getElementById("return-chat-1");
        order.style.display = 'none';
    }
}    
function showSecondReturnChat2(chat) {
    var chat_button = document.getElementById(chat);
    disablePreviousChat(chat_button);
    user_chat_height = document.getElementById(chat).clientHeight;

    if (chat === "return-chat-5") { // yes
        var order = document.getElementById("return-response-5");
        // use the chat variable to get the chat element
        
        // Show loader
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        setTimeout(function() {
            loader.style.display = 'none';
            order.style.marginTop = user_chat_height + 30 + 'px';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
        
        // Turn off other buttons of the same category
        var product = document.getElementById("return-chat-6");
        product.style.display = 'none';
    }
    
    else { // no
        // Turn off other buttons of the same category
        var yes_button = document.getElementById("return-chat-5");
        yes_button.style.display = 'none';
    
        var order = document.getElementById("return-response-6");
        var form_response = document.getElementById("form-response");
    
        // Show the loader
        var loader = document.getElementById("chat-loader");
        order.insertAdjacentElement('afterend', loader);
        loader.style.marginTop = '10px';
        loader.style.display = 'block';
    
        // Hide the form response
        form_response.style.display = 'none';
    
        // Show the AI response with a delay
        setTimeout(function() {
            loader.style.display = 'none';
            order.style.marginTop = user_chat_height + 30 + 'px';
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds
    
        // Show the form response with a delay
        setTimeout(function() {
            form_response.style.display = 'block';
        }, 2100); // 2100 milliseconds = 2.1 seconds
    }
}   
// Add an event listener to the clear button
document.getElementById('clearButton').addEventListener('click', function() {
    // Set a flag in local storage to indicate that the modal should be opened after page refresh
    sessionStorage.setItem('openModal', 'true');
    // Refresh the page
    location.reload();
});
// Check if the flag indicating the modal should be opened is set in session storage
var openModalFlag = sessionStorage.getItem('openModal');
if (openModalFlag === 'true') {
    // Use setTimeout to delay opening the modal after the page reloads
    setTimeout(function() {
        var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
        myModal.show();
        // Remove the flag from session storage
        sessionStorage.removeItem('openModal');
    }, 100); // Adjust the delay as needed
}
