<?php

namespace App\Filament\Resources\CateringTesttimonialResource\Pages;

use App\Filament\Resources\CateringTesttimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCateringTesttimonial extends EditRecord
{
    protected static string $resource = CateringTesttimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
