<?php

namespace App\Filament\Resources\TrukResource\Pages;

use App\Filament\Resources\TrukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTruk extends EditRecord
{
    protected static string $resource = TrukResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
