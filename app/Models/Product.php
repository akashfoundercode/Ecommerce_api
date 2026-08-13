<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $appends = [
        'thumbnail_url',
    ];

    protected $fillable = [
        'name', 
        'product_name',
        'price', 
        'description', 
        'image',
        'image_url',
        'slug',
        'sku',
        'short_description',
        'specification',
        'selling_price',
        'discount',
        'stock',
        'thumbnail',
        'status',
        'category_id', 
        'brand_id', 
        'sub_category_id'
    ];

    public function getImageUrlAttribute($value)
    {
        return $this->imageUrlFromPath($this->attributes['thumbnail'] ?? null)
            ?? $this->imageUrlFromPath($value)
            ?? $this->imageUrlFromPath($this->attributes['image'] ?? null);
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->imageUrlFromPath($this->attributes['thumbnail'] ?? null);
    }

    private function imageUrlFromPath(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (preg_match('/^https?:\/\//i', $path)) {
            return $path;
        }

        $path = ltrim($path, '/');

        if (str_starts_with($path, 'private/') || str_starts_with($path, 'var/') || str_starts_with($path, 'tmp/')) {
            return null;
        }

        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        if (str_starts_with($path, 'public/')) {
            $path = substr($path, 7);
        }

        return asset('storage/'.$path);
    }
}
