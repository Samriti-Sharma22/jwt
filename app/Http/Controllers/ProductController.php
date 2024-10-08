<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts (Request $request) {
        try {
            return Product::paginate(8);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch the record' ],500);
        }
    }

    public function showProducts ($id) {
        try {
            return Product::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to find the record' ],500);
        }
    }

    public function searchProducts ($id) {
        try {
            $query = $request->input('query');
            return Product::where('name','like',"%$query")->paginate(8);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to search the record' ],500);
        }
    }
}