<div class="modal fade" id="extraModal" tabindex="-1" aria-labelledby="extraModalLabel" aria-hidden="true">

    <!-- Is responsible for expanding the fields for the item in the inventory management system -->

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="extraModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" method="POST" action="{{ route('product-store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="Title here">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">Description goes here:</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        @foreach ($product->warehouses as $warehouse)
                            <div class="input-group mb-3">
                                <span class="input-group-text">Warehouse {{ $warehouse->id }}:</span>
                                <input type="number" class="form-control"
                                    name="warehouse_quantities[{{ $warehouse->id }}]"
                                    value="{{ $product->stockAmount($warehouse->id) ?? 0 }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attributes (Note: attributes are to be put in array format, so
                            "data1","data2"...etc)</label>
                        <div id="attributeFields">
                            
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addAttributeField">Add
                            Attribute</button>
                    </div>
                    <div class="mb-3">
                        <label for="cost" class="form-label">Cost</label>
                        <input type="number" class="form-control" id="cost" name="cost"
                            value="Product cost here" step="any">
                    </div>
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount Percentage</label>
                        <input type="number" class="form-control" id="discount" name="discount"
                            value="Discounted Percentage here">
                    </div>

                    <!-- Image Upload Section -->
                    <div class="mb-3">
                        <label class="form-label">Images (Max: 5)</label>
                        <div id="imageUploadContainer">
                            <div class="input-group"><input type="file" class="form-control mt-2" name="images[]"
                                    accept="image/*">
                                <div class="btn-group mt-2">
                                    <button type="button" class="btn btn-secondary btn-sm unset-image">Unset</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addImageField">Add
                            Image</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="editProductForm">Create</button>
            </div>
        </div>
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

    document.getElementById('addImageField').addEventListener('click', function() {
        var imageUploadContainer = document.getElementById('imageUploadContainer');

        // Count the number of current images
        var imageInputs = imageUploadContainer.querySelectorAll('input[type=file]');
        if (imageInputs.length + preExistingImageCount < 5) {
            var lastInput = imageInputs[imageInputs.length - 1];
            if (!lastInput || lastInput.files.length > 0) { // Check if last input is not set or has a file
                var newInput = createImageInput();
                imageUploadContainer.appendChild(newInput);
                if (imageInputs.length === 4) {
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