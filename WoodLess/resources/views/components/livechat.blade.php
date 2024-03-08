<div id="userhelp">
        @if(mt_rand(0,5) == 0 && is_null(session('status')))
        <div class="card-body-s">
            <div>
                <span class="close">&times;</span>
                <p class="chat-message">We are here to help do not hesitate to get in touch</p>
            </div>
        </div>
        @endif

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sticky sticky-bottom z-1 end-0" data-bs-toggle="modal"
            data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-message"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a support ticket</h1>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
    <div class="message" id="messageContainer">
        <div>
            <div class="row">
                <div class="col-md-6">
                    <div class="aichat">
                        <span class="chatmessage">How can we help today?</span>
                    </div>
                    <!-- class ai chat is bubble for ai (styling) -->
                    <!-- id order shows span message -->
                    <div class="aichat" id="order">
                        <span>Sorry to here you had an issue with your order, could you provide more details so I can help?</span>
                    </div>
                    <!-- id product shows span message -->
                    <div class="aichat" id="product">
                        <span>Sorry to here you had an issue with your product, could you provide more details so I can help?</span>
                    </div>
                    <div class="aichat" id="return">
                        <!-- id return shows span message -->
                        <span>Sorry to here you had an issue with your return, could you provide more details so I can help?</span>
                    </div>
                    <!-- second order responses -->
                    <!-- id product shows span message -->
                    <div class="aichat" id="order-response-1">
                        <span>Sorry to here this our order typically take 7-14 days to arrive but this can be delayed due to unforseen circumstances 
                            Did this help resolve your issue ?
                        </span>
                    </div>
                    <div class="aichat" id="order-response-2">
                        <!-- id return shows span message -->
                        <span>Sorry to here this our order currently we only accept debit cards and paypal and no other payment type
                        Did this help resolve your issue ?
                        </span>
                    </div>
                    <div class="aichat" id="order-response-3">
                        <!-- id return shows span message -->
                        <span> Unofortunately at the moment we do not offer International shipping as we cannot do so in an enviromentally friendly manner
                        Did this help resolve your issue ?</span>
                    </div>
                    <div class="aichat" id="order-response-4">
                        <!-- id return shows span message -->
                        <span>  Sorry I am only able to answer the most common questions please fill out this form and we will get back to you
                            <form action="{{ route('user.tickets.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>

                            <label for="information">Information</label>
                            <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </form>
                        </span>
                    </div>
                   
                    <!-- third order response -->
                    <div class="aichat" id="order-response-5">
                        <!-- id return shows span message -->
                        <span> Thank you I am glad we could help</span>
                    </div>
                    <div class="aichat" id="order-response-6">
                        <!-- id return shows span message -->
                        <span> Sorry we could not help please fill out this form and a memeber of our team will be in touch
                             <form action="{{ route('user.tickets.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>

                            <label for="information">Information</label>
                            <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </form>
                        </span>
                    </div>
                </div> 
                <!-- Second product responses -->
                <!-- second order responses -->
<!-- id product shows span message -->
<div class="aichat" id="product-response-1">
    <span>Sorry to here this our order typically take 7-14 days to arrive but this can be delayed due to unforeseen circumstances 
    Did this help resolve your issue ?
    </span>
</div>
<div class="aichat" id="product-response-2">
    <!-- id return shows span message -->
    <span>Sorry to here this our order currently we only accept debit cards and PayPal and no other payment type
    Did this help resolve your issue ?
    </span>
</div>
<div class="aichat" id="product-response-3">
    <!-- id return shows span message -->
    <span> Unfortunately at the moment we do not offer International shipping as we cannot do so in an environmentally friendly manner
    Did this help resolve your issue ?</span>
</div>
<div class="aichat" id="product-response-4">
    <!-- id return shows span message -->
    <span>  Sorry I am only able to answer the most common questions please fill out this form and we will get back to you
        <form action="{{ route('user.tickets.store') }}" method="POST">
            @csrf
            <div class="modal-body">
            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>

                            <label for="information">Information</label>
                            <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </form>
                        </span>
                    </div>
                    <!-- third product response -->
                    <!-- third order response -->
<div class="aichat" id="product-response-5">
    <!-- id return shows span message -->
    <span> Thank you I am glad we could help</span>
</div>
<div class="aichat" id="product-response-6">
    <!-- id return shows span message -->
    <span> Sorry we could not help please fill out this form and a member of our team will be in touch
        <form action="{{ route('user.tickets.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>

                <label for="information">Information</label>
                <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Create Ticket</button>
            </div>
        </form>
    </span>
</div>

                <div class="col-md-6">
                    <!-- First chat -->
                    <!-- class user chat for styling of any user chat 
                on click is the function parenthesis matches id of what u wanna show -->
                <!-- id is used to hide each button -->
                    <div class="userchat" onclick="showChat('order')" id="order-button">
                        <span><i class="fa-regular fa-user"></i> Issue with an order?</span>
                    </div>
                    <div class="userchat" onclick="showChat('product')" id="product-button">
                        <span><i class="fa-regular fa-user"></i> Issue with a product?</span>
                    </div>
                    <div class="userchat" onclick="showChat('return')" id="return-button">
                        <span><i class="fa-regular fa-user"></i> Issue with a return?</span>
                    </div>

                    <!-- Second order chat (issues) -->
                    <div class="userchat" onclick="showSecondOrderChat('order-chat-1')" id="order-chat-1">
                        <span><i class="fa-regular fa-user"></i> My order has not arrived yet</span>
                    </div>
                    <div class="userchat" onclick="showSecondOrderChat('order-chat-2')" id="order-chat-2">
                        <span><i class="fa-regular fa-user"></i> I cannot pay for my order at checkout ? </span>
                    </div>
                    <div class="userchat" onclick="showSecondOrderChat('order-chat-3')" id="order-chat-3">
                        <span><i class="fa-regular fa-user"></i> I am not able to get my order shipped internationally</span>
                    </div>
                    <div class="userchat" onclick="showSecondOrderChat('order-chat-4')" id="order-chat-4">
                        <span><i class="fa-regular fa-user"></i> A different order related problem</span>
                    </div>
                    <!-- third order chat (yes or no) -->
                    <div class="userchat" onclick="showSecondOrderChat2('order-chat-5')" id="order-chat-5">
                        <span><i class="fa-regular fa-user"></i> Yes</span>
                    </div>
                    <div class="userchat" onclick="showSecondOrderChat2('order-chat-6')" id="order-chat-6">
                        <span><i class="fa-regular fa-user"></i> No</span>
                    </div>
               <!-- Second product chat (issues) -->
<div class="userchat" onclick="showSecondProductChat('product-chat-1')" id="product-chat-1">
    <span><i class="fa-regular fa-user"></i> My order has not arrived yet</span>
</div>
<div class="userchat" onclick="showSecondProductChat('product-chat-2')" id="product-chat-2">
    <span><i class="fa-regular fa-user"></i> I cannot pay for my order at checkout ? </span>
</div>
<div class="userchat" onclick="showSecondProductChat('product-chat-3')" id="product-chat-3">
    <span><i class="fa-regular fa-user"></i> I am not able to get my order shipped internationally</span>
</div>
<div class="userchat" onclick="showSecondProductChat('product-chat-4')" id="product-chat-4">
    <span><i class="fa-regular fa-user"></i> A different order related problem</span>
</div>

<!-- Third product user chat (yes or no) -->
<div class="userchat" onclick="showSecondProductChat2('product-chat-5')" id="product-chat-5">
    <span><i class="fa-regular fa-user"></i> Yes</span>
</div>
<div class="userchat" onclick="showSecondProductChat2('product-chat-6')" id="product-chat-6">
    <span><i class="fa-regular fa-user"></i> No</span>
</div>



                    
                </div>
            </div>
        </div>
    </div>

    

            </div>
        </div>
                

    

                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat -->
                        <!-- form for creating a ticket -->
                        <!-- <form action="{{ route('user.tickets.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">

                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>

                            <label for="information">Information</label>
                            <textarea name="information" id="information" class="form-control" required style="resize: none;"></textarea>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Create Ticket</button>
                        </div>
                    </form> -->

                    </div>
                </div>
            </div>
        </div>
    </div>