<container id="infoModals">
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <!-- Is responsible for expanding the fields for the item in the inventory management system -->

        <div class="modal-dialog modal-dialog-centered resizable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalTitle">Order Details</h5>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">


                        <!-- Display the order ID underneath--->
                        <p>Order ID: {{ $order->id }}</p>

                    </div>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Total Item Amount: </strong><br>
                                {{ $order->totalOrderedQuantity() }}
                            </p>

                        </div>
                        <div class="col-md-6">
                            <p>
                                @if ($order->status->id == 3)
                                    <strong>Delivery in: </strong><br>
                                    {{ $order->created_at->addDays(14)->format('Y-m-d') }}
                                    ({{ now()->diffInDays($order->created_at->addDays(14)) }} days)
                                @elseif ($order->status->id == 4)
                                    <strong>Returning in: </strong><br>
                                    {{ $order->updated_at->addDays(14)->format('Y-m-d') }}
                                    ({{ now()->diffInDays($order->updated_at->addDays(14)) }} days)
                                @elseif ($order->status->id == 5)
                                    <strong>Returned </strong><br>
                                    <span style="color: green;">&#10004;</span>
                                @else
                                    <strong>Delivered</strong><br>
                                    <span style="color: green;">&#10004;</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-6">
                            <p><strong>Total Cost: </strong><br>
                                {{ $order->products->sum('cost') }}
                            </p>

                        </div>
                        <div class="col-md-6">
                            <p><strong>Status: </strong><br>
                                {{ $order->status->status }}
                            </p>
                        </div>

                    </div>

                    <div class="row text-center">
                        <p><strong>Delivery Address: </strong><br>
                            {{ $order->address->house_number }} {{ $order->address->street_name }},
                            {{ $order->address->city }}.
                            {{ $order->address->postcode }}
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col justify-content-left">
                                <button class="btn btn-warning" data-bs-target="#ProductsModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Products</button>
                                <button class="btn btn-warning" data-bs-target="#StatusModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Set Status</button>
                                <button class="btn btn-warning" data-bs-target="#DetailsModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Set Note</button>
                            </div>
                            <div class="col-auto order-lg-last">
                                <button id="btn-close" type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="ProductsModal" aria-hidden="true" aria-labelledby="ProductsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ProductsModal">
                        Products
                    </h5>
                </div>
                <div class="modal-body">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#infoModal" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="StatusModal" aria-hidden="true" aria-labelledby="StatusModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="StatusModal">
                        Status of Order
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        @foreach ($order_status as $status)
                            <div class="col-md-6 mb-2">
                                <form
                                    action="{{ route('order-status', ['id' => $order->id, 'statusId' => $status->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="status_id" value="{{ $status->id }}">
                                    <button type="submit"
                                        class="btn btn-warning btn-block">{{ $status->status }}</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-target="#infoModal" data-bs-toggle="modal"
                        data-bs-dismiss="modal">Back to details</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="DetailsModal" aria-hidden="true" aria-labelledby="DetailsModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DetailsModal">
                        Details
                    </h5>
                </div>
                <form action="{{ route('order-details', ['id' => $order->id]) }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <p><strong>Input Details: </strong><br>
                            <textarea name="details" class="form-control" placeholder="Please input note for order">{{ $order->details ?? '' }}</textarea>


                        </p>
                    </div>

                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-auto order-lg-last">
                                <button type="submit" class="btn btn-primary">Submit</button>


                            </div>
                            <div class="col justify-content-left">
                                <button type="button" class="btn btn-primary" data-bs-target="#infoModal" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Back to info</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</container>
