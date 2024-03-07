<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {

        return view('base');
    }

    public function ProdCreate()
    {

        return view('product/create');
    }

    public function ProdStore(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'published' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->is_published = $request->has('published');
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/products');
            $product->image = $imagePath;

            // $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $imageName); // Public Folder
        }
        $product->save();

        return redirect()->route('product-create')->with('success', 'Product created successfully!');

    }
}
