@extends('template.base')

@section('content')
    @include('template._create-form')

    <div class="flex justify-between items-center">
        <h1 class="text-xl flex-1">Product List</h1>
        <form
            hx-get="/api/products"
            hx-target="#product-list"
            hx-trigger="submit"
            hx-swap="innerHTML"
        >
              <span class="mr-2">Filter:</span>
            <input type="text" name="filter" class="p-2 border border-gray-300 rounded mb-2" autocomplete="off" placeholder="Search Here">
        </form>
        <button class="btn btn-primary ml-3 mb-2" data-toggle="modal" data-target="#inputModal">
            New Product
        </button>
    </div>
    <hr>
    <div id="product-list" class="flex flex-wrap gap-3 justify-between mt-3"
        hx-get="/api/products"
        hx-trigger="load delay:500ms"
        hx-swap="innerHTML"
    ></div>
@endsection
