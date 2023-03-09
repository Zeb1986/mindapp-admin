<?php

namespace App\Filament\Resources\UserFeedResource\Pages;

use App\Filament\Resources\UserFeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUserFeed extends CreateRecord
{
    protected static string $resource = UserFeedResource::class;
}
