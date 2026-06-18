<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'talles',
        'image',
        'images',
        'category_id',
        'active',
    ];

    protected $casts = [
        'price'  => 'decimal:2',
        'stock'  => 'integer',
        'active' => 'boolean',
        'images' => 'array',
    ];

    // Devuelve el array completo de imágenes, o [image] si sólo hay una
    public function getAllImagesAttribute(): array
    {
        if ($this->images && count($this->images) > 0) {
            return $this->images;
        }
        return $this->image ? [$this->image] : [];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}