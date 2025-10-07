<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'brand',
        'madeInPlace',
        'isDiscounted',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'isDiscounted' => 'boolean',
    ];

    // Accessors (getters)

    public function getIdAttribute($value): int
    {
        return (int) $value;
    }
    public function getNameAttribute($value): string
    {
        return (string) $value;
    }

    public function getDescriptionAttribute($value): ?string
    {
        return $value === null ? null : (string) $value;
    }
    public function getPriceAttribute($value): ?string  
    {
        return $value === null ? null : (string) $value;
    }

    public function getBrandAttribute($value): ?string
    {
        return $value === null ? null : (string) $value;
    } 
    
    public function getMadeInPlaceAttribute($value): ?string
    {
        return $value === null ? null : (string) $value;
    }

    public function getIsDiscountedAttribute($value): bool
    {
        return (bool) $value;
    }


    // Mutators (setters)
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = is_string($value) ? $value : (string) $value;
    }

    public function setDescriptionAttribute($value): void
    {
        $this->attributes['description'] = $value === null ? null : (string) $value;
    }

    public function setPriceAttribute($value): void
    {
       $this->attributes['price'] = is_string($value) ? $value : (string) $value;
    }

    public function setBrandAttribute($value): void
    {
        $this->attributes['brand'] = $value === null ? null : (string) $value;
    }

    public function setMadeInPlaceAttribute($value): void
    {
        $this->attributes['madeInPlace'] = $value === null ? null : (string) $value;
    }

    public function setIsDiscountedAttribute($value): void
    {
     $this->attributes['isDiscounted'] = $value === null ? null : (bool) $value;
    }
}