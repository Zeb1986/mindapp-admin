<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserFeedResource\Pages;
use App\Filament\Resources\UserFeedResource\RelationManagers;
use App\Models\UserFeed;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserFeedResource extends Resource
{
    protected static ?string $model = UserFeed::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_feed_id')->required(),
                Forms\Components\TextInput::make('user_id')->required(),
                Forms\Components\TextInput::make('provider')->required(),
                Forms\Components\TextInput::make('feed_id')->required(),
                Forms\Components\TextInput::make('state')->required(),
                Forms\Components\TextInput::make('timestamp')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_feed_id'),
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('provider'),
                Tables\Columns\TextColumn::make('feed_id'),
                Tables\Columns\TextColumn::make('state'),
                Tables\Columns\TextColumn::make('timestamp'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserFeeds::route('/'),
            'create' => Pages\CreateUserFeed::route('/create'),
            'edit' => Pages\EditUserFeed::route('/{record}/edit'),
        ];
    }
}
