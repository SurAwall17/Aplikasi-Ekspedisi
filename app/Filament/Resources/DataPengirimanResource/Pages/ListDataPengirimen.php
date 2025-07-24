<?php

namespace App\Filament\Resources\DataPengirimanResource\Pages;

use App\Filament\Resources\DataPengirimanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPengirimen extends ListRecords
{
    protected static string $resource = DataPengirimanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
