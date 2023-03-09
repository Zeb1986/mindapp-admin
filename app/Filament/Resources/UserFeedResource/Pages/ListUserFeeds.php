<?php

namespace App\Filament\Resources\UserFeedResource\Pages;

use App\Filament\Resources\UserFeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserFeeds extends ListRecords
{
    protected static string $resource = UserFeedResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
