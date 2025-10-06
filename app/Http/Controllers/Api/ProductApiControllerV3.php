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
        // Validate input without DB-backed unique rule (we'll enforce uniqueness manually)
        $validatedData = $request->validate([
            'id' => 'required|string',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Ensure the ID is unique within the in-memory list
        $id = (string) $validatedData['id'];
        if (Product::findOrFail($id)) {
            return response()->json([
                'message' => 'The id has already been taken.'
            ], 422);
        }

        // Create the product in-memory (see Product::create override)
        $product = Product::create([
            'id' => $id,
            'name' => $validatedData['name'],
            'description' => $validatedData['description'] ?? null,
        ]);


        return response()->json(['message' => 'Product created successfully', 'product' => $product], 201);
    }

}