<?php

namespace App\Filament\Resources\FooResource\Pages;

use App\Filament\Resources\FooResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFoo extends CreateRecord
{
    protected static string $resource = FooResource::class;
}
