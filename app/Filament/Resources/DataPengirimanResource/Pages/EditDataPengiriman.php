<?php

namespace App\Filament\Resources\DataPengirimanResource\Pages;

use App\Filament\Resources\DataPengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataPengiriman extends EditRecord
{
    protected static string $resource = DataPengirimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
