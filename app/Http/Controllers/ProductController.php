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
        $products = Product::orderBy('created_at', 'desc');

        if ($filter) {
            $products->where('name', 'like', '%' . $filter . '%')
                    ->orWhere('description', 'like', '%' . $filter . '%');
        }

        $products = $products->get();

        return view('templates._products-list-for-create', ['products'=>$products]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'required|url',
            'quantity' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            $products = Product::orderBy('created_at', 'desc')->get();
            return view('templates._create-products-error', ['errors' => $validator->errors()->all(), 'products' => $products]);
        }

        Product::create($request->all());

        $products = Product::orderBy('created_at', 'desc')->get();

        $success = '';

        $success .= '<div hx-swap-oob="true" id="addProductMessage">
                        <div class="bg-green-500 p-2 rounded">
                            Product successfully added!
                        </div>
                    </div> ';

        $prods = view('templates._products-list-for-create', ['products' => $products])->render();

        return $prods . $success;
    }

    public function edit($id) {
        $product = Product::find($id);
        return view('templates.edit-product', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'image_url' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
        $product->update($request->all());

        return redirect('/products');
    }

    public function delete(Product $product) {
        $product->delete();
        return "";
    }



}
