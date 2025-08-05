<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'thumbnail',
        'layout',
        'styles',
        'is_premium',
        'price',
        'downloads',
        'rating',
        'rating_count',
        'is_active'
    ];

    protected $casts = [
        'layout' => 'array',
        'styles' => 'array',
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'rating' => 'decimal:2'
    ];

    // العلاقات
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function presentations()
    {
        return $this->hasMany(Presentation::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFree($query)
    {
        return $query->where('is_premium', false);
    }

    public function scopePremium($query)
    {
        return $query->where('is_premium', true);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('downloads', 'desc');
    }

    public function scopeHighRated($query)
    {
        return $query->where('rating', '>=', 4.0)->orderBy('rating', 'desc');
    }

    // Accessors
    public function getFormattedDownloadsAttribute()
    {
        if ($this->downloads >= 1000000) {
            return round($this->downloads / 1000000, 1) . 'M';
        } elseif ($this->downloads >= 1000) {
            return round($this->downloads / 1000, 1) . 'K';
        }
        return $this->downloads;
    }

    public function getFormattedPriceAttribute()
    {
        return $this->is_premium ? '$' . number_format($this->price, 2) : 'Free';
    }
}
