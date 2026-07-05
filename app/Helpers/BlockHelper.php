<?php

namespace App\Helpers;

use App\Models\PageBlock;
use Illuminate\Support\Facades\Cache;

class BlockHelper
{
    /**
     * Get a page block by slug with caching.
     */
    public static function get(string $slug): ?PageBlock
    {
        return Cache::remember("block.{$slug}", 60, function () use ($slug) {
            return PageBlock::with('fields')->where('slug', $slug)->first();
        });
    }

    /**
     * Get a specific field value from a block.
     */
    public static function field(string $slug, string $key, mixed $default = null): mixed
    {
        $block = static::get($slug);
        return $block?->field($key, $default) ?? $default;
    }

    /**
     * Get all content from a block as array.
     */
    public static function content(string $slug): array
    {
        $block = static::get($slug);
        return $block?->content() ?? [];
    }

    /**
     * Check if a block is active.
     */
    public static function isActive(string $slug): bool
    {
        $block = static::get($slug);
        return $block?->is_active ?? false;
    }

    /**
     * Clear cache for a specific block or all blocks.
     */
    public static function clearCache(?string $slug = null): void
    {
        if ($slug) {
            Cache::forget("block.{$slug}");
        } else {
            // Clear all block caches
            $slugs = PageBlock::pluck('slug');
            foreach ($slugs as $s) {
                Cache::forget("block.{$s}");
            }
        }
    }
}
