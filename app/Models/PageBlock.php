<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageBlock extends Model
{
    protected $fillable = ['slug', 'title', 'order', 'is_active', 'settings'];

    protected $casts = [
        'is_active' => 'boolean',
        'settings' => 'array',
    ];

    public function fields(): HasMany
    {
        return $this->hasMany(BlockField::class)->orderBy('order');
    }

    /**
     * Get a specific field value by key.
     */
    public function field(string $key, mixed $default = null): mixed
    {
        $field = $this->fields->firstWhere('key', $key);

        if (!$field) {
            return $default;
        }

        return match ($field->type) {
            'number' => (float) $field->value,
            'json' => json_decode($field->value, true),
            'image' => $field->value ? '/storage/' . $field->value : $default,
            default => $field->value,
        };
    }

    /**
     * Get all fields as key => value array.
     */
    public function content(): array
    {
        return $this->fields->mapWithKeys(function ($field) {
            $value = match ($field->type) {
                'number' => (float) $field->value,
                'json' => json_decode($field->value, true),
                'image' => $field->value ? '/storage/' . $field->value : null,
                default => $field->value,
            };
            return [$field->key => $value];
        })->toArray();
    }

    /**
     * Scope to get only active blocks, ordered.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order');
    }

    /**
     * Find block by slug.
     */
    public static function findBySlug(string $slug): ?self
    {
        return static::with('fields')->where('slug', $slug)->first();
    }
}
