<container id="ExtraModals">
    <div class="modal fade" id="ExtraModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <!-- Is responsible for expanding the fields for the item in the inventory management system -->

        <div class="modal-dialog modal-dialog-centered resizable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ExtraModalTitle">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <!-- Assuming $user->image is a URL to the image -->
                        @if($user->image)
                        <img src="{{$user->image}}" alt="User Image">
                        @else
                        <!-- Default image if no user image available -->
                        <img src="https://placehold.co/300x350" alt="Default User Image">
                        @endif
                        <!-- Display the user ID underneath the image with margin -->
                        <p class="mt-3 mb-0">User ID: {{$user->id}}</p>
                        <!-- Display the role underneath the image without a title -->
                        <h5><strong>{{$user->is_admin ? 'Admin' : 'Customer'}}</strong></h1>
                            <!-- Thin line -->
                            <hr>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>First name</strong><br>{{$user->first_name}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Last Name</strong><br>{{$user->last_name}}</p>

                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Email</strong><br>{{$user->email}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email verified</strong><br>
                                @if($user->email_verified_at)
                                <span style="color: green;">&#10004;</span>
                                @else
                                <span style="color: red;">&#10008;</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Phone number</strong><br>{{$user->phone_number}}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>City</strong><br>{{ $user->addresses->isEmpty() ? 'N/A' : $user->addresses->first()->city }}</p>
                        </div>
                        <div class="container">
                            <div class="row justify-content-center">
                            </div>
                        </div>
                    </div>
                    <br>
                    <p class="text-center"><strong>Created</strong> {{date('F j, Y', strtotime($user->created_at))}}</p>
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col justify-content-left">
                                <button class="btn btn-warning" data-bs-target="#AddressesModal" data-bs-toggle="modal" data-bs-dismiss="modal">Address</button>
                                <button class="btn btn-warning" data-bs-target="#CardsModal" data-bs-toggle="modal" data-bs-dismiss="modal">Card</button>
                            </div>
                            <div class="col-auto order-lg-last">
                                <button id="btn-close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="CardsModal" aria-hidden="true" aria-labelledby="CardsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CardsModal">
                        @if(count($user->cards) > 1)
                        Cards
                        @else
                        Card
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    @foreach($user->cards as $index => $cards)
                    <h5><strong>Card ({{ $index + 1 }})</strong></h5>
                    <p>
                        <strong>Card number</strong>
                        @foreach(array_chunk(str_split($cards->card_number), 4) as $chunk)
                        {{ implode('', $chunk) }}
                        @endforeach
                        <br>
                        <strong>Expiry date</strong>
                        {{ $cards->expiry_date }}
                    </p>
                    <p class="fs-6">{{ $cards->house_number }} {{ $cards->street_name }}<br>
                        {{ $cards->city }}, {{ $cards->postcode }}
                    </p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#ExtraModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#ExtraModal" role="button">Return</a>

    <div class="modal fade" id="AddressesModal" aria-hidden="true" aria-labelledby="AddressesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddressesModal">
                        @if(count($user->addresses) > 1)
                        Delivery addresses
                        @else
                        Delivery address
                        @endif
                    </h5>
                </div>
                <div class="modal-body">
                    @foreach($user->addresses as $index => $address)
                    <h5><strong>Address ({{ $index + 1 }})</strong></h5>
                    <p class="fs-6">{{ $address->house_number }} {{ $address->street_name }}<br>
                        {{ $address->city }}, {{ $address->postcode }}
                    </p>
                    @endforeach
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#ExtraModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-primary" data-bs-toggle="modal" href="#ExtraModal" role="button">Return</a>

</container>