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
        if($request->hasfile('path')) {
            $file = $request->file('path');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
        }
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->SKU = $request->SKU;
        $product->value = $request->value;
        $product->path = $name;
        $product->store_id = $request->store_id;
        $product->save();

        return response()->json('Created', 201);
    }
}
