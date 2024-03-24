<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true"
    data-bs-backdrop="static">

    <!-- Is responsible for expanding the fields for the item in the inventory management system -->

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editProductForm" method="POST" action="{{ route('product-store', ['id' => $product->id]) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $product->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Warehouse</label>
                        <select class="form-select" id="warehouseSelect">
                            <option value="" selected>Select Warehouse</option>
                            @foreach ($warehouses as $warehouse)
                                <option value="{{ $warehouse->id }}">{{ $warehouse->address }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="warehouseStock" class="mb-3">
                        @foreach ($warehouses as $warehouse)
                            <div id="warehouseInput_{{ $warehouse->id }}" class="warehouse-input"
                                style="display: none;">
                                <label for="quantity_{{ $warehouse->id }}" class="form-label">Quantity for Warehouse
                                    {{ $warehouse->id }}</label>
                                <input type="number" class="form-control" id="quantity_{{ $warehouse->id }}"
                                    name="quantities[{{ $warehouse->id }}]" min="0"
                                    value="{{ $product->stockAmount($warehouse->id) }}">
                            </div>
                        @endforeach
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Categories</label>
                        <select class="form-select" name="categories[]" multiple aria-label="Select Categories">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attributes (Note: attributes are to be put in array format, so
                            "data1","data2"...etc)</label>
                        <div id="attributeFields">
                            @foreach (json_decode($product->attributes, true) as $key => $value)
                                <div class="row mb-3">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" name="attributes_keys[]"
                                            placeholder="Attribute Name" value="{{ $key }}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="attributes_values[]"
                                            placeholder="Attribute Value" value="{{ $value }}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger remove-attribute">&times;</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addAttributeField">Add
                            Attribute</button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tags (Note: tags are separated by commas)</label>
                        <div id="tagFields">
                            @foreach (explode(',', $product->tags) as $tag)
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" name="tags[]" placeholder="Tag"
                                            value="{{ $tag }}">
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-danger remove-tag">&times;</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addTagField">Add Tag</button>
                    </div>

                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost"
                            value="{{ $product->cost }}" step="any">
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount Percentage - Discounted Price:
                            {{ sprintf('%0.2f', round($product->cost - $product->cost * ($product->discount / 100), 2)) }}</label>
                        <input type="number" class="form-control" id="discount" name="discount"
                            value="{{ $product->discount }}">
                    </div>
                    <!-- Pre-existing Images -->
                    <div class="mb-3">
                        <label class="form-label">Pre-existing Images</label>
                        <div id="preExistingImagesContainer" class="row row-cols-3 g-3">
                            @php
                                // Retrieve the product images from the database
                                $productImages = explode(',', $product->images);

                                foreach ($productImages as $imagePath) {
                                    // Generate the URL for each image and add it to the $imageUrls array
                                    $imageUrl = Storage::url($imagePath);
                                    $imageUrls[] = $imageUrl;
                                }
                            @endphp
                            @foreach ($imageUrls as $index => $image)
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ $image }}" alt="Pre-existing Image"
                                            class="card-img-top img-thumbnail">
                                        <div class="card-body">
                                            <button type="button" class="btn btn-danger btn-sm remove-image"
                                                data-image-index="{{ $index }}">Remove</button>
                                            <input type="hidden" name="pre_existing_images[]"
                                                value="{{ $image }}">

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div class="mb-3">
                        <label class="form-label">Images (Max: 5)</label>
                        <div id="imageUploadContainer">
                            <!-- checks if pre existing images are more then 5. -->
                            @if (count(explode(',', $product->images)) < 5)
                                <div class="input-group"><input type="file" class="form-control mt-2"
                                        name="images[]" accept="image/*">
                                    <div class="btn-group mt-2">
                                        <button type="button"
                                            class="btn btn-secondary btn-sm unset-image">Unset</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addImageField">Add
                            Image</button>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="editProductForm">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function createImageInput() {
            var newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.className = 'form-control mt-2';
            newInput.name = 'images[]';
            newInput.accept = 'image/*';

            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger btn-sm remove-image';
            removeButton.innerText = 'Remove';

            var unsetButton = document.createElement('button');
            unsetButton.type = 'button';
            unsetButton.className = 'btn btn-secondary btn-sm unset-image';
            unsetButton.innerText = 'Unset';

            var buttonGroup = document.createElement('div');
            buttonGroup.className = 'btn-group mt-2';
            buttonGroup.appendChild(removeButton);
            buttonGroup.appendChild(unsetButton);

            var inputGroup = document.createElement('div');
            inputGroup.className = 'input-group';
            inputGroup.appendChild(newInput);
            inputGroup.appendChild(buttonGroup);

            return inputGroup;
        }

        // Count the number of existing images
        var preExistingImageCount = document.querySelectorAll('#preExistingImagesContainer img').length;

        document.getElementById('addImageField').addEventListener('click', function() {
            var imageUploadContainer = document.getElementById('imageUploadContainer');

            // Count the number of current images
            var imageInputs = imageUploadContainer.querySelectorAll('input[type=file]');
            if (imageInputs.length + preExistingImageCount < 5) {
                var lastInput = imageInputs[imageInputs.length - 1];
                if (!lastInput || lastInput.files.length > 0) { // Check if last input is not set or has a file
                    var newInput = createImageInput();
                    imageUploadContainer.appendChild(newInput);
                    if (imageInputs.length + preExistingImageCount === 4) {
                        document.getElementById('addImageField').disabled = true;
                        document.getElementById('addImageField').innerText = 'Images Full';
                    }
                } else {
                    alert('Please select an image for the previous entry before adding a new one.');
                }
            } else {
                alert('You can upload a maximum of 5 images.');
                document.getElementById('addImageField').disabled = true;
                document.getElementById('addImageField').innerText = 'Images Full';
            }
        });

        document.getElementById('imageUploadContainer').addEventListener('change', function() {
            var imageInputs = this.querySelectorAll('input[type=file]');
            var lastInput = imageInputs[imageInputs.length - 1];
            if (lastInput.files.length > 0 && imageInputs.length + preExistingImageCount < 5) {
                document.getElementById('addImageField').disabled = false;
                document.getElementById('addImageField').innerText = 'Add Image';
            }
        });

        document.getElementById('imageUploadContainer').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-image')) {
                event.target.closest('.input-group').remove();
                document.getElementById('addImageField').disabled = false;
                document.getElementById('addImageField').innerText = 'Add Image';
            } else if (event.target.classList.contains('unset-image')) {
                var inputGroup = event.target.closest('.input-group');
                var inputFile = inputGroup.querySelector('input[type=file]');
                inputFile.value = ''; // Clear the file input
            }
        });

        // Event listener for removing pre-existing images
        document.querySelectorAll('#preExistingImagesContainer .remove-image').forEach(function(btn) {
            btn.addEventListener('click', function() {
                this.closest('.col').remove();
                // Enable the "Add Image" button
                document.getElementById('addImageField').disabled = false;
                document.getElementById('addImageField').innerText = 'Add Image';
                preExistingImageCount--;
            });
        });
    </script>





    <script>
        document.getElementById('addAttributeField').addEventListener('click', function() {
            var attributeFields = document.getElementById('attributeFields');

            var row = document.createElement('div');
            row.className = 'row mb-3';

            var keyCol = document.createElement('div');
            keyCol.className = 'col-auto';
            var keyInput = document.createElement('input');
            keyInput.type = 'text';
            keyInput.className = 'form-control';
            keyInput.placeholder = 'Attribute Name';
            keyInput.name = 'attributes_keys[]';
            keyCol.appendChild(keyInput);

            var valueCol = document.createElement('div');
            valueCol.className = 'col';
            var valueInput = document.createElement('input');
            valueInput.type = 'text';
            valueInput.className = 'form-control';
            valueInput.placeholder = 'Attribute Value';
            valueInput.name = 'attributes_values[]';
            valueCol.appendChild(valueInput);

            var deleteCol = document.createElement('div');
            deleteCol.className = 'col-auto';
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger remove-attribute';
            deleteButton.innerHTML = '&times;';
            deleteCol.appendChild(deleteButton);

            row.appendChild(keyCol);
            row.appendChild(valueCol);
            row.appendChild(deleteCol);

            attributeFields.appendChild(row);
        });

        document.getElementById('attributeFields').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-attribute')) {
                event.target.parentElement.parentElement.remove();
            }
        });
    </script>

    <script>
        document.getElementById('addTagField').addEventListener('click', function() {
            var tagFields = document.getElementById('tagFields');

            var row = document.createElement('div');
            row.className = 'row mb-3';

            var tagCol = document.createElement('div');
            tagCol.className = 'col';
            var tagInput = document.createElement('input');
            tagInput.type = 'text';
            tagInput.className = 'form-control';
            tagInput.placeholder = 'Tag';
            tagInput.name = 'tags[]';
            tagCol.appendChild(tagInput);

            var deleteCol = document.createElement('div');
            deleteCol.className = 'col-auto';
            var deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.className = 'btn btn-danger remove-tag';
            deleteButton.innerHTML = '&times;';
            deleteCol.appendChild(deleteButton);

            row.appendChild(tagCol);
            row.appendChild(deleteCol);

            tagFields.appendChild(row);
        });

        document.getElementById('tagFields').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-tag')) {
                event.target.parentElement.parentElement.remove();
            }
        });
    </script>


    <script>
        document.getElementById('warehouseSelect').addEventListener('change', function() {
            var warehouseId = this.value;
            var warehouseInputs = document.querySelectorAll('.warehouse-input');
            if (warehouseId) {
                // Hide all warehouse inputs
                warehouseInputs.forEach(function(input) {
                    input.style.display = 'none';
                });
                // Show the input for the selected warehouse
                document.getElementById('warehouseInput_' + warehouseId).style.display = 'block';
            } else {
                // Hide all inputs if no warehouse is selected
                warehouseInputs.forEach(function(input) {
                    input.style.display = 'none';
                });
            }
        });
    </script>

</div>
