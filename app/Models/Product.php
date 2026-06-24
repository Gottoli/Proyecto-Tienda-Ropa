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
        'stock_talles',
        'talles',
        'image',
        'images',
        'category_id',
        'genero',
        'active',
    ];

    protected $casts = [
        'price'        => 'decimal:2',
        'stock'        => 'integer',
        'stock_talles' => 'array',
        'active'       => 'boolean',
        'images'       => 'array',
    ];

    public function getStockTalleAttribute(string $talle): int
    {
        if ($this->stock_talles && isset($this->stock_talles[$talle])) {
            return (int) $this->stock_talles[$talle];
        }
        return 0;
    }

    public function disponibleParaTalle(?string $talle): int
    {
        if ($talle && $this->stock_talles && isset($this->stock_talles[$talle])) {
            return (int) $this->stock_talles[$talle];
        }
        return (int) $this->stock;
    }

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