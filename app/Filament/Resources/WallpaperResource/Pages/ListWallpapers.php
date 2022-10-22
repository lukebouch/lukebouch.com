<?php

namespace App\Filament\Resources\WallpaperResource\Pages;

use App\Filament\Resources\WallpaperResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWallpapers extends ListRecords
{
    protected static string $resource = WallpaperResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}