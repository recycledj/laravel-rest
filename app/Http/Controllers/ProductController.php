<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
class ProductController extends Controller
{
    public function AllProducts()
    {
        $products = DB::table('products')
        ->join('stores', 'products.store_id', '=', 'stores.id')
        ->select('products.*', 'stores.name AS store')
        ->get();
        if(count($products)>0) {
            return $products;
        }else {
            return 'Aún no hay productos almacenados';
        }
    }
    public function SaveProduct(Request $request)
    {
        $product = new Product();
        if($request->hasFile('path')) {
            $file = $request->path;
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        $product->value = $request->value;
        $product->store_id = $request->store_id;
        $product->path = $name;
        $product->save();

        return response()->json('Created', 201);
    }
    public function DeleteProduct(Product $product) {
        $product->delete();
        return response()->json('Deleted', 200);
    }
    public function GetProduct(Product $product) {
        return $product;
    }
    public function UpdateProduct(Request $request, Product $product) {
        $product = Product::FindOrFail($product->id);
        if($request->hasFile('path')) {
            $file = $request->path;
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        $product->value = $request->value;
        $product->store_id = $request->store_id;
        $product->path = $name;
        $product->save();
        return response()->json('Update', 200);
    }
}
