@extends('base.base')

@section('title', 'Edit')

@section('content')
    <div class="container px-32 py-8 flex justify-center h-fit min-h-screen max-h-full">
        <div id="wrapper" class="wrapper p-8 h-max">
            <h2 class="mb-4 text-2xl font-extralight tracking-widest" style="opacity: 0.7;">EDIT PRODUCT</h2>
            <form method="POST" action="{{ route('update', ['description' => $products->description]) }}">
                @csrf
                @method('PUT')
                <div class="form">
                    <div class="input-row">
                        <label class="name" for="name">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">NAME</h3>
                            <input class="text-black w-full" style="width: 100%;" type="text" name="name" value="{{ $products->name }}">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="description" for="description">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">DESCRIPTION</h3>
                            <input class="text-black w-full" type="text" name="description" value="{{ $products->description }}">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="quantity" for="quantity">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">QUANTITY</h3>
                            <input class="text-black w-full" type="number" name="quantity" value="{{ $products->quantity }}">
                        </label>
                    </div>
                    <div class="input-row">
                        <label class="price" for="price">
                            <h3 class="font-extralight tracking-widest" style="opacity: 0.68;">Price</h3>
                            <input class="text-black w-full" type="text" name="price" value="{{  $products->price }}">
                        </label>
                    </div>
                    <div class="input-row btns flex justify-between items-center">
                        <button type="submit" id="submit-btn" class="px-3 py-2 tracking-widest text-black">SUBMIT</button>
                        <a href="{{ route('products', ['description' => $products->description]) }}" style="font-weight: 200;" class="font-extralight tracking-widest opacity-40 hover:opacity-100 duration-500">
                            <span>BACK</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection