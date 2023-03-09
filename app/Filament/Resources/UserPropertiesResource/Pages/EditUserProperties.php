<?php

namespace App\Filament\Resources\UserPropertiesResource\Pages;

use App\Filament\Resources\UserPropertiesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserProperties extends EditRecord
{
    protected static string $resource = UserPropertiesResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
