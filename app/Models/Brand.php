<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $appends = [
        'logo_url',
    ];

    protected $fillable = [
        'brand_name',
        'slug',
        'logo',
        'description',
        'status',
    ];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->imageUrlFromPath($this->attributes['logo'] ?? null);
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
