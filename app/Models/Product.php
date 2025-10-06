<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
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

    // Mutators (setters)
    public function setNameAttribute($value): void
    {
        $this->attributes['name'] = is_string($value) ? $value : (string) $value;
    }

    public function setDescriptionAttribute($value): void
    {
        $this->attributes['description'] = $value === null ? null : (string) $value;
    }
}