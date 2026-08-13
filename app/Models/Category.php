<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $appends = [
        'image_url',
    ];

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'status',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->imageUrlFromPath($this->attributes['image'] ?? null);
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
