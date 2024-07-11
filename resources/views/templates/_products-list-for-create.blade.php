@foreach ($products as $product)
    @include('templates._single-product', ['prod'=>$product])
@endforeach



