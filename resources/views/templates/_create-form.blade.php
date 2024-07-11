<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-4xl" id="inputModalLabel">Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetForm()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="productForm"
                    hx-post="/api/products"
                    hx-trigger="submit"
                    hx-target="#product-list"
                    hx-swap="innerHTML"
                >
                    <div class="form-group">
                        <label for="productName" class="text-xl">Name</label>
                        <input type="text" class="form-control" id="productName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="productDescription" class="text-xl">Description</label>
                        <textarea class="form-control" id="productDescription" name="description" required rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice" class="text-xl">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="price" required step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="productQuantity" class="text-xl">Quantity</label>
                        <input type="number" class="form-control" id="productQuantity" name="quantity" required>
                    </div>
                     <div class="form-group">
                        <label for="productImageUrl" class="text-xl">Image URL</label>
                        <input type="url" class="form-control" id="productImageUrl" required name="image_url">
                    </div>
                    <div id="addProductMessage"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-2xl" data-dismiss="modal" onclick="resetForm()">Close</button>
                        <button type="submit" class="btn btn-primary text-2xl">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('productForm').reset();
        document.getElementById('addProductMessage').classList.add('hidden');
    }

    document.addEventListener('htmx:afterSwap', (event) => {
        if (event.detail.target.id === 'product-list') {
            const newProduct = event.detail.target.firstElementChild;
            newProduct.classList.add('fade-in');
        }
    });
</script>