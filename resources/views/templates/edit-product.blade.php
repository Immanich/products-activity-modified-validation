@extends('templates.base')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products/update/{{ $product->id }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="image_url" class="block text-gray-700">Image URL</label>
            <input type="text" name="image_url" value="{{ $product->image_url }}" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full border border-gray-300 p-2 rounded">{{ $product->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="text" name="price" value="{{ $product->price }}" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700">Quantity</label>
            <input type="text" name="quantity" value="{{ $product->quantity }}" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save changes</button>
    </form>
</div>
@endsection
