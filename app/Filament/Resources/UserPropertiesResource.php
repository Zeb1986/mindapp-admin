<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserPropertiesResource\Pages;
use App\Filament\Resources\UserPropertiesResource\RelationManagers;
use App\Models\UserProperties;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserPropertiesResource extends Resource
{
    protected static ?string $model = UserProperties::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('user_id')->required(),
//                Forms\Components\TextInput::make('email')->email()->required(),
//                Forms\Components\TextInput::make('name')->required(),
//                Forms\Components\TextInput::make('locale')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id'),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('locale'),
                Tables\Columns\TextColumn::make('user.registration_time')->label('Registration Time')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUserProperties::route('/'),
//            'create' => Pages\CreateUserProperties::route('/create'),
//            'edit' => Pages\EditUserProperties::route('/{record}/edit'),
        ];
    }
}
