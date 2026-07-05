<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlockField extends Model
{
    protected $fillable = ['page_block_id', 'key', 'value', 'type', 'label', 'order'];

    public function pageBlock(): BelongsTo
    {
        return $this->belongsTo(PageBlock::class);
    }
}
