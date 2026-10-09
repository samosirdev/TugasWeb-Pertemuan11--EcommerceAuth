<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function casts(): array
    {
        return ['price' => 'decimal:2', 'is_active' => 'boolean'];
    }

    public function category()   { return $this->belongsTo(Category::class); }
    public function orderItems() { return $this->hasMany(OrderItem::class); }
    public function reviews()    { return $this->hasMany(Review::class); }

    // ===== SCOPES =====
    public function scopeActive(Builder $q): Builder  { return $q->where('is_active', true); }
    public function scopeInStock(Builder $q): Builder { return $q->where('stock', '>', 0); }
    public function scopePriceBetween(Builder $q, $min, $max): Builder
    {
        return $q->whereBetween('price', [$min, $max]);
    }
}
