<?php

namespace App\Filament\Resources\PostTopicResource\Pages;

use App\Filament\Resources\PostTopicResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostTopic extends EditRecord
{
    protected static string $resource = PostTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
