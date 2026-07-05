<?php

namespace App\Filament\Resources\PageBlockResource\Pages;

use App\Filament\Resources\PageBlockResource;
use App\Helpers\BlockHelper;
use Filament\Resources\Pages\EditRecord;

class EditPageBlock extends EditRecord
{
    protected static string $resource = PageBlockResource::class;

    protected function afterSave(): void
    {
        // Clear block cache when content is updated
        BlockHelper::clearCache($this->record->slug);
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
