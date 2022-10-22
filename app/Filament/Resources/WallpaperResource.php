<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WallpaperResource\Pages;
use App\Filament\Resources\WallpaperResource\RelationManagers;
use App\Models\Wallpaper;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WallpaperResource extends Resource
{
    protected static ?string $model = Wallpaper::class;

    protected static ?string $navigationIcon = 'heroicon-o-photograph';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name'),
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\Textarea::make('description')->columnSpan('full'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('Wallpaper')->collection('wallpaper')->multiple(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('wallpaper')->collection('wallpaper')->rounded(),
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
            'index' => Pages\ListWallpapers::route('/'),
            'create' => Pages\CreateWallpaper::route('/create'),
            'edit' => Pages\EditWallpaper::route('/{record}/edit'),
        ];
    }
}
