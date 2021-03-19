<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $slug = $request->input('slug');
        $type = $request->input('type');
        $limit = $request->input('limit', 6);
        $product_name = $request->input('product_name');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $product = Product::with('galleries')->find($id);

            if($product)
                return responseFormatter::success($product, 'Data Berhasil diambil');
            else
                return responseFormatter::error(null, 'data tidak ada !', 404);
        }

        if($slug)
        {
            $product = Product::with('galleries')->where('slug', $slug)->first();

            if($product)
                return responseFormatter::success($product, 'Data Berhasil diambil');
            else
                return responseFormatter::error(null, 'data tidak ada !', 404);
        }

        $product = Product::with('galleries');

        if($product_name)
            $product->where('product_name', 'like', '%'. $product_name .'%');
        if($type)
            $product->where('type', 'like', '%'. $type .'%');
        if($price_from)
            $product->where('price', '>=', $price_from);
        if($price_to)
            $product->where('price', '<=', $price_to);

        return responseFormatter::success(
            $product->paginate($limit),
            'Data berhasil diambil'
        );
    }
}
