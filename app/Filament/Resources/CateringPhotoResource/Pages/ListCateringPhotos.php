<?php

namespace App\Filament\Resources\CateringPhotoResource\Pages;

use App\Filament\Resources\CateringPhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCateringPhotos extends ListRecords
{
    protected static string $resource = CateringPhotoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
