<?php

namespace App\Filament\Resources\Penguruses\Schemas;

use Filament\Schemas\Schema;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class PengurusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jabatan')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('foto')
                    ->image()
                    ->directory('pengurus')
                    ->nullable(),
            ]);
    }
}
