<?php

namespace App\Filament\Resources\PostTopicResource\Pages;

use App\Filament\Resources\PostTopicResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostTopics extends ListRecords
{
    protected static string $resource = PostTopicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
