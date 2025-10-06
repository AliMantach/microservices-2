<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Utils;
use Illuminate\Http\Request;

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

        public function show(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        if (!$product) return response()->json(['error' => 'Product not found'], 404);

        $productCollection = new ProductCollection([$product]);

        return response()->json($productCollection, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

}