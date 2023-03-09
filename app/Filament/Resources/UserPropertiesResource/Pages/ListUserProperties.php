<?php

namespace App\Filament\Resources\UserPropertiesResource\Pages;

use App\Filament\Resources\UserPropertiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserProperties extends ListRecords
{
    protected static string $resource = UserPropertiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
