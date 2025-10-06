<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductApiControllerV2 extends Controller
{


    public function index(): JsonResponse
    {
        $products = ProductResource::collection(Product::all());
        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        if (!$product) return response()->json(['error' => 'Product not found'], 404);

        $productResource = new ProductResource($product);

        return response()->json($productResource, 200);
    }
}