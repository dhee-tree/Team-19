document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.querySelector('.card-body-s .close');
    var cardBody = document.querySelector('.card-body-s');
    closeButton.addEventListener('click', function () {
        cardBody.style.display = 'none';


    });


});




function showChat(chat) {
    if (chat == "order") {
        var order = document.getElementById("order");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("product-button");
        product.style.display = 'none';

        var return1 = document.getElementById("return-button");
        return1.style.display = 'none';

        // Show next user option
        var order_chat_1 = document.getElementById("order-chat-1");
        var order_chat_2 = document.getElementById("order-chat-2");
        var order_chat_3 = document.getElementById("order-chat-3");
        var order_chat_4 = document.getElementById("order-chat-4");
        
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_3.style.display = 'block';
            order_chat_4.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    } 
    else if (chat == "product") {
        var product = document.getElementById("product");
        product.style.display = 'block';
        var product_chat_1 = document.getElementById("product-chat-1");
        var product_chat_2 = document.getElementById("product-chat-2");
        var product_chat_3 = document.getElementById("product-chat-3");
        var product_chat_4 = document.getElementById("product-chat-4");
        
        setTimeout(function() {
            product_chat_1.style.display = 'block';
            product_chat_2.style.display = 'block';
            product_chat_3.style.display = 'block';
            product_chat_4.style.display = 'block';
            product_chat_1.style.marginTop = '120px';
        }, 2500);

        var order = document.getElementById("order-button");
        order.style.display = 'none';

        var return1 = document.getElementById("return-button");
        return1.style.display = 'none';
    } 
    else {
        var order = document.getElementById("return");
        order.style.display = 'block';
    }
}
function showSecondOrderChat(chat) {
    if (chat === "order-chat-1") {
        var order = document.getElementById("order-response-1");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("order-chat-2");
        product.style.display = 'none';

        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';

        // Show next user option
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
    } 
    else if (chat === "order-chat-2") {
        var product = document.getElementById("order-response-2");
        product.style.display = 'block';
        // Show next user option
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);

        var order = document.getElementById("order-chat-1");
        order.style.display = 'none';

        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';
    } 
    else if (chat === "order-chat-3") {
        var order = document.getElementById("order-response-3");
        var product = document.getElementById("order-response-3");
        product.style.display = 'block';
        // Show next user option
        var order_chat_1 = document.getElementById("order-chat-5");
        var order_chat_2 = document.getElementById("order-chat-6");
        setTimeout(function() {
            order_chat_1.style.display = 'block';
            order_chat_2.style.display = 'block';
            order_chat_1.style.marginTop = '120px';
        }, 2500);
        var order = document.getElementById("order-chat-1");
        order.style.display = 'none';

        var return1 = document.getElementById("order-chat-2");
        return1.style.display = 'none';
        var shush = document.getElementById("order-chat-4");
        shush.style.display = 'none';
    }
    else{
        var shush = document.getElementById("order-response-4");
        setTimeout(function() {
            shush.style.display = 'block';
        }, 2500);
        var product = document.getElementById("order-chat-2");
        product.style.display = 'none';

        var return1 = document.getElementById("order-chat-3");
        return1.style.display = 'none';
        var order = document.getElementById("order-chat-1");
        return1.style.display = 'none';
       
    }
}
      

    


function showSecondOrderChat2(chat) {
    if (chat === "order-chat-5") {
        var order = document.getElementById("order-response-5");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("order-chat-6");
        product.style.display = 'none';

     

        
    } 
    
    else {
        var order = document.getElementById("order-response-6");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("order-chat-5");
        order.style.display = 'block'; 
        product.style.display = 'none';
    }
}


function showSecondProductChat(chat) {
    if (chat === "product-chat-1") {
        var order = document.getElementById("product-response-1");
        setTimeout(function() {
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
        product.style.display = 'block';
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
        var product = document.getElementById("product-response-3");
        product.style.display = 'block';
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
        setTimeout(function() {
            shush.style.display = 'block';
        }, 2500);
        var product = document.getElementById("product-chat-2");
        product.style.display = 'none';

        var return1 = document.getElementById("product-chat-3");
        return1.style.display = 'none';
        var order = document.getElementById("product-chat-1");
        return1.style.display = 'none';       
    }
}
function showSecondProductChat2(chat) {
    if (chat === "product-chat-5") {
        var order = document.getElementById("product-response-5");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("product-chat-6");
        product.style.display = 'none';
    } 
    else {
        var order = document.getElementById("product-response-6");
        setTimeout(function() {
            order.style.display = 'block';
        }, 2000); // 2000 milliseconds = 2 seconds

        var product = document.getElementById("product-chat-5");
        order.style.display = 'block'; 
        product.style.display = 'none';
    }
}