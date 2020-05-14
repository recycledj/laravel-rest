<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    public function Stores(){
        return Store::all();
    }
    public function Show(Store $store) {
        return $store;
    }
    public function CreateStore(Request $request) {
        $store = Store::create($request->all());
        return response()->json($store, 201);
    }
    public function UpdateStore(Request $request, Store $store) {
        $store->update($request->all());
        return response()->json($store, 200);
    }
    public function DeleteStore(Store $store) {
        $store->delete();
        return response()->json('Deleted', 204);
    }
}
