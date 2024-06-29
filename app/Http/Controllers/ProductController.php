<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $products = Product::orderBy('id');

        if($request->filter) {
            $products->where('name','like',"%$request->filter%")
                ->orWhere('description','like',"%$request->filter%");
        }

        $html = "";

        foreach($products->get() as $prod) {
            $formattedPrice = number_format($prod->price, 2);
            $html .= "
            <div class='p-4 rounded bg-blue-200 w-[20rem]'>
                <h3 class='flex justify-between'>Product: <span>$prod->name</span></h3>
                <hr class='m-2'> 
                <div class='flex justify-between'>Description: <span>$prod->description</span></div>
                <div class='flex justify-between'>Quantity: <span>$prod->quantity</span></div>
                <div class='flex justify-between'>Price: <span>₱$formattedPrice</span></div>
                <div class='flex justify-end gap-4 mt-2'>
                    <a 
                        href='".route('edit', $prod->description)."'>
                        <span></span>
                        <i class='fa-regular fa-pen-to-square'></i>
                    </a>
                    <button 
                        hx-delete='".route('destroy', $prod->id)."'
                        hx-confirm='Are you sure you want to delete this product?'
                        hx-target='this'
                        hx-swap='none'
                        onclick='setTimeout(function(){ location.reload(); }, 100)'>
                        <i class='fa-solid fa-trash'></i>
                    </button>   
                </div>
            </div>
            ";
        }
        return $html;
    }

    public function destroy($id) {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['alert' => ['type' => 'success', 'message' => 'Product deleted successfully.']]);
        } else {
            return response()->json(['alert' => ['type' => 'danger', 'message' => 'Product not found.']]);
        }
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        $products = Product::orderBy('id');
        $html = "";
        
        foreach($products->get() as $prod) {
            $formattedPrice = number_format($prod->price, 2);
            $html .= "
            <div class='p-4 rounded bg-blue-200 w-[20rem]'>
                <h3 class=''>Name: $prod->name</h3>
                <hr class='m-2'>
                <div class=''>Description: $prod->description</div>
                <div class=''>Quantity: $prod->quantity</div>
                <div class=''>Price: ₱$formattedPrice</div>
            </div>
            <div hx-swap-oob='true' id='success' class='bg-green-200 text-center m-2 rounded'>
            Product Successfully Added!
            </div>
        ";
         }

         if($product){

            return $html . " <div hx-get='/message' hx-target='#message' hx-trigger='load'></div>";

         }else{

            return $html . " <div hx-get='/error' hx-target='#message' hx-trigger='load'></div>";

         }
        
    }

    public function open() {
        $html = '';
    
        $html .= '<div class="modal-header flex justify-between items-center border-b pb-2">
            <h4 class="text-lg">Create Product</h4>
        </div>
        <div class="modal-body my-4">
            <form id="modalForm" hx-post="api/create-product" hx-target="#products-list" hx-swap="innerHTML">
       
            <div class="form-group mb-4">
                    <label for="name" class="block mb-2">Name:</label>
                    <input type="text" id="name" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product name" name="name" required> 
                </div>
                <div class="form-group mb-4">
                    <label for="description" class="block mb-2">Description:</label>
                    <input type="text" id="description" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product description" name="description" required>
                </div>
                <div class="form-group mb-4">
                    <label for="price" class="block mb-2">Price:</label>
                    <input type="number" id="price" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product price" name="price" required>
                </div>
                <div class="form-group mb-4">
                    <label for="quantity" class="block mb-2">Quantity:</label>
                    <input type="number" id="quantity" class="w-full p-2 border border-gray-300 rounded" placeholder="Enter product quantity" name="quantity" required>
                </div>

                <div id="success" class="bg-green-200">

                </div>

                <div class="flex justify-between items-center">

                    <button type="submit" id="modalSubmitButton" class="btn bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Submit</button>
              
                </form>

                </div>
                
                <div class="float-right my-0">

                <button id="modalSubmitButton" onclick="closeModal()" class="btn bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">Close</button>
               </div>
        </div>';
    
        return $html;
    }
    
    
    public function close() {
        $html = '';

        $html .= '<button type="button" id="modalSubmitButton" onclick="closeModal()" class="btn bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Close</button>';

        return $html;
    }

    public function message(){

        $html = '';

        $html .= '
        <div hx-swap-oob="true" id="success" class="bg-green-200 text-center m-2 rounded">
        Product Successfully Added!

        </div>
        ';
        return $html;
    }

    public function error(){

        $html = '';

        $html .= '
        <div id="error" class="bg-red-200 text-center m-2 rounded">
        Product Error!

        </div>
        ';
        return $html;
        }
        
        public function edit($description) {
        $products = Product::where('description', $description)->firstOrFail();

        return view('edit', compact('products'));
        }

        public function update(Request $request, $description) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
            ]);

            $products = Product::where('description', $description)->firstOrFail();

            // if ($request->hasFile('image')) {
            //     $imagePath = $request->file('image')->store('images', 'public');
            //     $products->image = $imagePath;
            // }

            $products->name = $request->name;
            $products->description = $request->description;
            $products->quantity = $request->quantity;
            $products->price = $request->price;
            $products->is_seeded = false;

            $products->save();

            return redirect('/product')->with('success', 'Product updated successfully.');
        }

    }
