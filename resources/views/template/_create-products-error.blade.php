@include('template._products-list-for-create',['products'=>$products])

<div hx-swap-oob="true" id="addProductMessage">
    <div class="bg-red-200 text-red-800 p-4 rounded">
        <div>Please  fix the followwing: </div>
        <ul class="ms-4">
            @foreach ($errors as $err )
                <li class="list-disc">{{$err}}</li>
            @endforeach
        </ul>
    </div>
</div>
