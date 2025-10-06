<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Utils;

class ProductApiControllerV3 extends Controller
{


    public function index(): JsonResponse
    {
        $products = new ProductCollection(Product::all());
        return response()->json($products, 200);
    }

        public function paginate(): JsonResponse
    {
        $productCollection = new ProductCollection(Utils::paginate(Product::all(), 2));
        return response()->json($productCollection, 200);
    }

}