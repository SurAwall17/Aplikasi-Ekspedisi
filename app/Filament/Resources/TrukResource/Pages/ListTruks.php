<?php

namespace App\Filament\Resources\TrukResource\Pages;

use App\Filament\Resources\TrukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTruks extends ListRecords
{
    protected static string $resource = TrukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
