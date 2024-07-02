@extends('template.base')

@section('content')
    @include('template._create-form')

    <div class="flex justify-between items-center">
        <h1 class="text-4xl font-bold flex-1">Product List</h1>
        <form
            hx-get="/api/products"
            hx-target="#product-list"
            hx-trigger="submit"
            hx-swap="innerHTML"
        >
            <input type="text" name="filter" class="p-2 border border-gray-300 rounded mb-2 shadow-none shadow-transparent" autocomplete="off" placeholder="Search Here">
        </form>
        <button class="btn btn-primary ml-3 mb-2" data-toggle="modal" data-target="#inputModal">
            Add Product
        </button>
    </div>
    <hr>
    <div id="product-list" class="flex flex-wrap gap-3"
        hx-get="/api/products"
        hx-trigger="load delay:500ms"
        hx-swap="innerHTML"
    ></div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editModalContent">

                </div>
            </div>
        </div>
    </div>
@endsection
