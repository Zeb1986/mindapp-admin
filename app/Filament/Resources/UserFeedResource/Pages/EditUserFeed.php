<?php

namespace App\Filament\Resources\UserFeedResource\Pages;

use App\Filament\Resources\UserFeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserFeed extends EditRecord
{
    protected static string $resource = UserFeedResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
