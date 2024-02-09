<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">

    <!-- Is responsible for expanding the fields for the item in the inventory management system -->

    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    @csrf
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
                        <label class="form-label">Images (Max: 5)</label>
                        <div id="imageUploadContainer">
                            <input type="file" class="form-control" name="images[]" accept="image/*">
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="addImageField" disabled>Add Image</button>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="editProductForm">Save Changes</button>
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
        
        var closeButton = document.createElement('button');
        closeButton.type = 'button';
        closeButton.className = 'btn-close remove-image';
        
        var inputGroup = document.createElement('div');
        inputGroup.className = 'input-group';
        inputGroup.appendChild(newInput);
        inputGroup.appendChild(closeButton);
        
        return inputGroup;
    }

    document.getElementById('addImageField').addEventListener('click', function() {
        var imageUploadContainer = document.getElementById('imageUploadContainer');
        var imageInputs = imageUploadContainer.querySelectorAll('input[type=file]');
        if (imageInputs.length < 5) {
            var lastInput = imageInputs[imageInputs.length - 1];
            if (lastInput.files.length > 0) {
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
        if (lastInput.files.length > 0 && imageInputs.length < 5) {
            document.getElementById('addImageField').disabled = false;
            document.getElementById('addImageField').innerText = 'Add Image';
        }
    });

    document.getElementById('imageUploadContainer').addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-image')) {
            event.target.parentElement.remove();
            document.getElementById('addImageField').disabled = false;
            document.getElementById('addImageField').innerText = 'Add Image';
        }
    });

    document.getElementById('addAttributeField').addEventListener('click', function() {
        var attributeFields = document.getElementById('attributeFields');
        
        var keyInput = document.createElement('input');
        keyInput.type = 'text';
        keyInput.className = 'form-control';
        keyInput.placeholder = 'Attribute Name';
        keyInput.name = 'new_attributes_keys[]';

        var valueInput = document.createElement('input');
        valueInput.type = 'text';
        valueInput.className = 'form-control mt-2';
        valueInput.placeholder = 'Attribute Value';
        valueInput.name = 'new_attributes_values[]';
        
        var inputGroup = document.createElement('div');
        inputGroup.className = 'input-group';
        inputGroup.appendChild(keyInput);
        inputGroup.appendChild(valueInput);

        attributeFields.appendChild(inputGroup);
    });
</script>