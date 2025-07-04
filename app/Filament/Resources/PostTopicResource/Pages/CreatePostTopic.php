<?php

namespace App\Filament\Resources\PostTopicResource\Pages;

use App\Filament\Resources\PostTopicResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePostTopic extends CreateRecord
{
    protected static string $resource = PostTopicResource::class;
}
