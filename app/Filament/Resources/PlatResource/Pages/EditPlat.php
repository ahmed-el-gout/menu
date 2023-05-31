<?php

namespace App\Filament\Resources\PlatResource\Pages;

use App\Filament\Resources\PlatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlat extends EditRecord
{
    protected static string $resource = PlatResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
