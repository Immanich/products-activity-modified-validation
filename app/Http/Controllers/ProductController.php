<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter');
        $products = Product::orderBy('name');

        if ($filter) {
            $products->where('name', 'like', '%' . $filter . '%');
        }

        $products = $products->get();

        $html = '';

        foreach ($products as $prod) {
            $html .= "
                <div class='p-4 rounded bg-blue-200 w-[22rem] m-2'>
                    <h3 class='text-2xl'>{$prod->name}</h3>
                    <img src='{$prod->image_url}' alt='{$prod->name}' class='w-full h-48 object-cover mt-2 mb-2 rounded'>
                    <hr>
                    <div class='italic text-gray-500'>
                        {$prod->description}
                    </div>
                    <div class='text-4xl text-right'>\${$prod->price}
                    </div>
                </div>
            ";
        }
        return $html;
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
        ]);
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'price' => 'required|numeric|min:0',
        //     'image_url' => 'required|url',
        // ]);

        if($validator->fails()){
            $products = Product::orderBy('name')->get();
            return view('template._create-products-error',['errors'=>$validator->errors()->all(), 'products'=>$products]);
        }

        Product::create($request->all());

        $products = Product::orderBy('name')->get();

        return view('template._products-list-for-create', ['products' => $products]);
    }
}
