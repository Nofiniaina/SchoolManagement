<?php

namespace App\Filament\Resources\ParcoursResource\Pages;

use App\Filament\Resources\ParcoursResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParcours extends EditRecord
{
    protected static string $resource = ParcoursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string {
        return $this->getResource()::getUrl("index");
    }
}
