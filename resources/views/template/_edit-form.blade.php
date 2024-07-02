<div class="modal-body" id="editModalContent">
    <form id="editForm" action="/api/products/{{ $product->id }}" method="POST" hx-put="/api/products/{{ $product->id }}" hx-target="#product-list" hx-swap="innerHTML" style="background-color: pink; padding: 1rem; border-radius: 8px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div id="updateSuccessMessage" class="bg-green-200 text-green-800 p-2 rounded mb-3" style="display: none;">
            Product successfully saved!
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn bg-green-400 hover:bg-green-500 duration-500" id="updateBtn">Update</button>
            <button type="button" class="btn bg-red-400 hover:bg-red-500 duration-500" data-dismiss="modal">Close</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('editForm').addEventListener('submit', function (event) {
        event.preventDefault();

        const form = event.target;
        const formData = new FormData(form);
        const updateBtn = document.getElementById('updateBtn');
        updateBtn.disabled = true; 
        updateBtn.textContent = 'Product saved!';

        fetch(form.action, {
            method: form.method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            updateBtn.disabled = false;
            updateBtn.textContent = 'Update';

            if (data.errors) {
                alert('There was an error updating the product.');
            } else {
                document.getElementById('updateSuccessMessage').style.display = 'block';
                alert('Product successfully updated!');
                setTimeout(() => {
                    document.getElementById('updateSuccessMessage').style.display = 'none';
                }, 3000);
            }
        })
        .catch(error => {
            updateBtn.disabled = false;
            updateBtn.textContent = 'Update';
            alert('An error occurred while updating the product.');
        });
    });
</script>
