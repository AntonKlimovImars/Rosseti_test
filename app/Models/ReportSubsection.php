<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportSubsection extends Model
{
    protected $fillable = [
        'report_page_id',
        'title',
        'slug',
        'content_blocks',
        'order',
    ];

    protected $casts = [
        'content_blocks' => 'array',
        'order' => 'integer',
    ];

    public function reportPage(): BelongsTo
    {
        return $this->belongsTo(ReportPage::class);
    }
}
