<?php

namespace App\Filament\Resources\WallpaperResource\Pages;

use App\Filament\Resources\WallpaperResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWallpaper extends EditRecord
{
    protected static string $resource = WallpaperResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
