<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses"]
    ];

    public function index(): JsonResponse
    {
        $products = self::$products;
        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        // Find product by id
        $product = null;
        foreach (self::$products as $p) {
            if ($p["id"] === $id) {
                $product = $p;
                break;
            }
        }
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        return response()->json($product, 200);
    }
}