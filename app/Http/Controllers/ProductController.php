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
            $formattedPrice = number_format($prod->price, 2);
            $html .= "
                <div class='p-4 rounded bg-blue-200 w-[20rem] m-1'>
                    <h3 class='text-2xl'>{$prod->name}</h3>
                    <hr>
                    <div class='italic text-gray-500'>
                        {$prod->description}
                    </div>
                    <div class='text-4xl text-right'>₱$formattedPrice</div>
                    <div class='flex justify-end mt-2'>
                        <button class='rounded bg-blue-400 hover:bg-blue-600 duration-500 cursor-pointer p-2 mr-2' hx-get='/api/products/{$prod->id}/edit' hx-target='#editModalContent' hx-trigger='click' data-toggle='modal' data-target='#editModal'>
                            Edit
                        </button>
                        <button class='rounded bg-red-400 hover:bg-red-600 duration-500  cursor-pointer p-2' hx-delete='/api/products/{$prod->id}' hx-confirm='Are you sure you want to delete this product?' hx-target='#product-list' hx-swap='innerHTML'>
                            Delete
                        </button>
                    </div>
                </div>
            ";
        }

        return $html;
    }

    private function validateProduct(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->validateProduct($request);

        if ($validator->fails()) {
            $products = Product::orderBy('name')->get();
            return view('template._create-products-error', [
                'errors' => $validator->errors()->all(),
                'products' => $products,
            ]);
        }

        if (empty($request->input('name')) || empty($request->input('description')) || empty($request->input('price'))) {
            $products = Product::orderBy('name')->get();
            return view('template._create-products-error', [
                'errors' => ['All fields are required.'],
                'products' => $products,
            ]);
        }

        Product::create($request->all());

        $products = Product::orderBy('name')->get();
        return view('template._products-list-for-create', ['products' => $products]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('template._edit-form', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = $this->validateProduct($request);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()], 422);
        }

        if (empty($request->input('name')) || empty($request->input('description')) || empty($request->input('price'))) {
            return response()->json(['errors' => ['All fields are required.']], 422);
        }

        $product->update($request->all());

        $products = Product::orderBy('name')->get();
        return view('template._products-list-for-create', ['products' => $products]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $products = Product::orderBy('name')->get();
        return view('template._products-list-for-create', ['products' => $products]);
    }
}
