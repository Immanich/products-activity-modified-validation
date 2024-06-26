@foreach ($products as $product)
    <div class='p-4 rounded bg-blue-200 w-[22rem] m-2'>
        <h3 class='text-2xl'>{{ $product->name }}</h3>
        <img src='{{ $product->image_url }}' alt='{{ $product->name }}' class='w-full h-48 object-cover mt-2 mb-2 rounded'>
        <hr>
        <div class='italic text-gray-500'>
            {{ $product->description }}
        </div>
        <div class='text-4xl text-right'>${{ $product->price }}</div>
    </div>
@endforeach

<div hx-swap-oob="true" id="addProductMessage">
    <div class="bg-green-200 text-green-800 p-2 rounded">
        The Product is added successfully!!
    </div>
</div>

