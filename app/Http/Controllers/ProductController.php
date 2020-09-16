<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Transaction;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

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
            $product->supplier;
            $product->department;
            if ($product->image_path) {
                $product->image_path = url("assets/{$product->image_path}");
            }
            $product->stock = 0;
            $product->inventory_cost = 0;
            $transaction = Transaction::where('product_id', $product->id)->latest('id')->first();
            if ($transaction) {
                $product->stock = $transaction['stock'];
                $product->inventory_cost = doubleval($transaction['cost']);
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
            'base_cost' => $request->base_cost,
            'profit' => $request->profit,
            'price' => $request->price
        ]);
        $product = Product::find($request->id);

        $product->supplier;
        $product->department;
        if ($product->image_path) {
            $product->image_path = url("assets/{$product->image_path}");
        }
        $product->stock = 0;
        $product->inventory_cost = 0;
        $transaction = Transaction::where('product_id', $product->id)->latest('id')->first();
        if ($transaction) {
            $product->stock = $transaction['stock'];
            $product->inventory_cost = doubleval($transaction['cost']);
        }

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
        $product->stock = 0;
        $product->inventory_cost = 0;
        $transaction = Transaction::where('product_id', $product->id)->latest('id')->first();
        if ($transaction) {
            $product->stock = $transaction['stock'];
            $product->inventory_cost = doubleval($transaction['cost']);
        }
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
            'base_cost' => $request->base_cost,
            'profit' => $request->profit,
            'price' => $request->price
        ]);

        if ($product->image_path) {
            $product->image_path = url("assets/{$product->image_path}");
        }

        $product = Product::find($request->id);

        $product->supplier;
        $product->department;
        if ($product->image_path) {
            $product->image_path = url("assets/{$product->image_path}");
        }
        $product->stock = 0;
        $product->inventory_cost = 0;
        $transaction = Transaction::where('product_id', $product->id)->latest('id')->first();
        if ($transaction) {
            $product->stock = $transaction['stock'];
            $product->inventory_cost = doubleval($transaction['cost']);
        }

        return response($product, 200);
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

    public function getProductId(Request $request)
    {

        if ($department = Department::find($request->department_id)) {
            $first_4_char = strtoupper(substr($department->name, 0, 4));
            if ($product = Product::where('id', 'like', "$first_4_char%")->latest()->first()) {
                $next_id = $first_4_char . str_pad((substr($product->id, 4, 8) + 1), 4, '0', STR_PAD_LEFT);

                return response(["id" => $next_id], 200);
            }
            $next_id = $first_4_char . str_pad((substr(1, 4, 8) + 1), 4, '0', STR_PAD_LEFT);

            return response(["id" => $next_id], 200);
        }

        return response(["message" => 'Department not found', "request" => $request->department_id], 404);
    }
}
