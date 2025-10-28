<?php

namespace App\Filament\Resources\CateringTesttimonialResource\Pages;

use App\Filament\Resources\CateringTesttimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCateringTesttimonials extends ListRecords
{
    protected static string $resource = CateringTesttimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
