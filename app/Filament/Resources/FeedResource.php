<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeedResource\Pages;
use App\Filament\Resources\FeedResource\RelationManagers;
use App\Models\Feed;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FeedResource extends Resource
{
    protected static ?string $model = Feed::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('feed_id')->required(),
                Forms\Components\Select::make('type')->required()->options([
                    'topic' => 'topic',
                    'reflection' => 'reflection',
                    'meditation' => 'meditation',
                ]),
                Forms\Components\TextInput::make('image')->required(),
                Forms\Components\TextInput::make('gradient')->required(),
                Forms\Components\TextInput::make('title')->required(),
                Forms\Components\TextInput::make('subtitle'),
                Forms\Components\Select::make('time')->options([
                    null => 'none',
                    'morning' => 'morning',
                    'evening' => 'evening',
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('feed_id')->sortable(),
                Tables\Columns\TextColumn::make('type')->sortable(),
                Tables\Columns\TextColumn::make('image')->sortable(),
                Tables\Columns\TextColumn::make('gradient')->sortable(),
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('subtitle')->sortable(),
                Tables\Columns\TextColumn::make('time')->sortable(),
                Tables\Columns\TextColumn::make('timestamp')->sortable(),
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
            'index' => Pages\ListFeeds::route('/'),
            'create' => Pages\CreateFeed::route('/create'),
            'edit' => Pages\EditFeed::route('/{record}/edit'),
        ];
    }
}
