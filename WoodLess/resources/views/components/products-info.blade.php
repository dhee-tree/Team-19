<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">
    <!-- Is responsible for expanding the fields for the item in the inventory managment system -->

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraModalLabel">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h5>Title:</h5>
                            <p>{{ $product->title }}</p>
                            <h5>Description:</h5>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>Categories:</h5>
                            @foreach ($product->categories as $category)
                                <p>{{ $category->category }}</p>
                            @endforeach
                        </div>

                        <div class="col">
                            <h5>Quantity:</h5>

                            @php
                                // Get all warehouses associated with the product
                                $warehouses = $product->warehouses;

                                // Initialize an array to store warehouse IDs and their corresponding stock amounts
                                $stockAmounts = [];

                                // Iterate over each warehouse
                                foreach ($warehouses as $warehouse) {
                                    // Call the stockAmount method for each warehouse to get its stock amount
                                    $stockAmount = $product->stockAmount($warehouse->id);

                                    // Store the warehouse ID and its corresponding stock amount in the array
                                    $stockAmounts[$warehouse->id] = $stockAmount;
                                }
                            @endphp

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Warehouse ID</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($warehouses as $warehouse)
                                        <tr>
                                            <td>{{ $warehouse->id }}</td>
                                            <td>{{ $stockAmounts[$warehouse->id] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
