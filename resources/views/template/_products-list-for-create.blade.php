@foreach ($products as $product)
    <div class='p-4 rounded bg-blue-200 w-[20rem] m-1'>
        <h3 class='text-2xl'>{{ $product->name }}</h3>
        <hr>
        <div class='italic text-gray-500'>
            {{ $product->description }}
        </div>
        <div class='text-4xl text-right'>₱{{ number_format($product->price, 2) }}</div>
        <div class='flex justify-end mt-2'>
            <button class='rounded bg-blue-400 hover:bg-blue-600 duration-500 cursor-pointer p-2 mr-2' hx-get='/api/products/{{ $product->id }}/edit' hx-target='#editModalContent' hx-trigger='click' data-toggle='modal' data-target='#editModal'>Edit</button>
            <button class='rounded bg-red-400 hover:bg-red-600 duration-500  cursor-pointer p-2' hx-delete='/api/products/{{ $product->id }}' hx-confirm='Are you sure you want to delete this product?' hx-target='#product-list' hx-swap='innerHTML'>Delete</button>
        </div>
    </div>
@endforeach

@if (isset($successMessage))
    <div hx-swap-oob="true" id="updateProductMessage">
        <div class="bg-green-200 text-green-800 p-2 rounded">
            {{ $successMessage }}
        </div>
    </div>
@endif

<div hx-swap-oob="true" id="addProductMessage">
    <div class="bg-green-200 text-green-900 p-2 rounded">
        The product was added successfully!
    </div>
</div>
