<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static $products = [
        ["id" => "1", "name" => "TV", "description" => "Best TV"],
        ["id" => "2", "name" => "iPhone", "description" => "Best iPhone"],
        ["id" => "3", "name" => "Chromecast", "description" => "Best Chromecast"],
        ["id" => "4", "name" => "Glasses", "description" => "Best Glasses"]
    ];

    public static function all($columns = ['*'])
    {
        return self::$products;
    }

    public static function findOrFail($id)
    {
        foreach (self::$products as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }
        return null;
    }
}