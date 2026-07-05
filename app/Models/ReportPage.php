<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportPage extends Model
{
    protected $fillable = [
        'number',
        'title',
        'slug',
        'hero_image',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function subsections(): HasMany
    {
        return $this->hasMany(ReportSubsection::class)->orderBy('order');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
