<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            if ($product->image_path) {
                $product->image_path = url("assets/{$product->image_path}");
            }
        }

        return $products;
    }

    public function get($path, $resource)
    {
        $file = Storage::get("{$path}/{$resource}");

        return response($file)
            ->header('Content-Type', 'image/png,image/jpeg,image/jpg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $path = null;

        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
        }

        $product = Product::create([
            'id' => $request->id,
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
            'description' => $request->description,
            'image_path' => $path,
            'profit' => $request->profit,
            'price' => $request->price
        ]);

        return response($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->image_path = url("assets/{$product->image_path}");
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $path = $product->image_path;

        if ($request->hasFile('image')) {
            Storage::delete($product->image_path);
            $path = $request->image->store('images');
        }

        $product->update([
            'department_id' => $request->department_id,
            'supplier_id' => $request->supplier_id,
            'description' => $request->description,
            'image_path' => $path,
            'profit' => $request->profit,
            'price' => $request->price
        ]);

        if ($product->image_path) {
            $product->image_path = url("assets/{$product->image_path}");
        }

        return response($product, 205);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image_path) {
            Storage::delete($product->image_path);
        }

        $product->delete();

        return response('', 205);
    }
}
