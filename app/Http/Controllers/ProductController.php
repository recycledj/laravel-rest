<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
class ProductController extends Controller
{
    public function AllProducts()
    {
        $products = DB::table('products')->get();
        if(count($products)>0) {
            return $products;
        }else {
            return 'Aún no hay productos almacenados';
        }
    }
}
