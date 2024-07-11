@extends('templates.base')

@section('content')
    @include('templates._create-form')

    <div class="flex justify-between items-center">
        <h1 class="text-4xl flex-1 font-bold">Products</h1>
        <form
            hx-get="/api/products"
            hx-target="#product-list"
            hx-trigger="submit"
            hx-swap="innerHTML"
        >
            <input type="text" name="filter" class="p-2 border border-gray-300 rounded mb-2" autocomplete="off">
        </form>
        <button class="btn btn-primary ml-3 mb-2 text-2xl" data-toggle="modal" data-target="#inputModal">
            Add Product
        </button>
    </div>
    <hr>
    <div id="product-list" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-3"
        hx-get="/api/products"
        hx-trigger="load delay:500ms"
        hx-swap="innerHTML"
        hx-on="htmx:afterSettle: addAnimation"
    >

    </div>

    <script>
        function addAnimation(event) {
            const newElements = event.target.querySelectorAll('div');
            newElements.forEach(element => {
                element.classList.add('fade-in');
            });
        }
    </script>
@endsection
