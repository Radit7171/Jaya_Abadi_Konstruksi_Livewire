<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'images', // JSON array of image paths from upload
        'is_published',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'images' => 'array', // Cast JSON to array
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the display category name
     */
    public function getCategoryLabel(): string
    {
        return match($this->category) {
            'konstruksi-gedung' => 'Konstruksi Gedung',
            'infrastruktur' => 'Infrastruktur',
            'renovasi' => 'Renovasi',
            'pekerjaan-selesai' => 'Pekerjaan Selesai',
            default => 'Lainnya',
        };
    }

    /**
     * Get short description (max 150 chars)
     */
    public function getShortDescription(): string
    {
        return strlen($this->description) > 150
            ? substr($this->description, 0, 150) . '...'
            : $this->description;
    }

    /**
     * Get all images with full URLs
     */
    public function getImageUrls(): array
    {
        if (!$this->images || empty($this->images)) {
            return [];
        }

        return array_map(function ($path) {
            return asset('storage/' . $path);
        }, $this->images);
    }

    /**
     * Get first image URL
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (!$this->images || empty($this->images)) {
                    return null;
                }
                return asset('storage/' . $this->images[0]);
            }
        );
    }

    /**
     * Scope to get only published projects
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to filter by category
     */
    public function scopeByCategory($query, string $category)
    {
        if ($category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }
}
