<div class="modal fade" id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModalLabel">Add Product</h5>
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
                        <label for="productName">Name</label>
                        <input type="text" class="form-control" id="productName" name="name" >
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" id="productDescription" name="description" rows="3" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" class="form-control" id="productPrice" name="price" step="0.01" >
                    </div>
                    <div id="addProductMessage">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="resetForm()">Back</button>
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function resetForm() {
        document.getElementById('productForm').reset();
    }
</script>
