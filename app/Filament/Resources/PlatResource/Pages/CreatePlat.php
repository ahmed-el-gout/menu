<?php

namespace App\Filament\Resources\PlatResource\Pages;

use App\Filament\Resources\PlatResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePlat extends CreateRecord
{
    protected static string $resource = PlatResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
