<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Store;
use Carbon\Carbon;

class StoreController extends Controller
{
    public function Stores(){
        return DB::table('stores')->get();
    }
    public function Show(Store $store) {
        return $store;
    }
    public function CreateStore(Request $request) {
        $name = $request->name;
        $oppening_date = $request->oppening_date;
        $store = DB::insert('INSERT INTO stores (name, oppening_date) VALUES (?, ?)', array($name, $oppening_date));
        $content;
        return response()->json('Created', 201);
    }
    public function UpdateStore(Request $request, Store $store) {
        $store = Store::findOrFail($store->id);
        $store->name = $request['name'];
        $store->oppening_date = $store->oppening_date;
        $store->save();
        return response()->json('Updated', 200);
    }
    public function DeleteStore(Store $store) {
        $store->delete();
        return response()->json('Deleted', 200);
    }
}
