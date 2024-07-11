<div class="p-4 rounded bg-slate-200 w-auto m-2 fade-me-out h-max" id="product{{$product->id}}">
    @include('templates._confirm-delete-product', ['prod' => $product])

    <h3 class="text-4xl flex justify-between">{{ $product->name }}</h3>
    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mt-2 mb-2 rounded">
    <hr>
    <div class="italic text-3xl h-25 my-5">
        {{ $product->description }}
    </div>
    <div class="text-2xl text-right flex justify-between">Price: <span>₱{{ number_format($product->price, 2) }}</span></div>
    <div class="text-2xl text-right flex justify-between">Quantity: <span>{{ $product->quantity }}</span></div>
    <div class="mt-3 flex justify-between">
        <span></span>
        <button class="py-2 px-4 bg-red-400 hover:bg-red-500 duration-300 rounded w-full sm:w-auto text-center"
            onclick="document.getElementById('deleteProduct{{$product->id}}').classList.remove('hidden')">
            Delete
        </button>
    </div>
</div>
