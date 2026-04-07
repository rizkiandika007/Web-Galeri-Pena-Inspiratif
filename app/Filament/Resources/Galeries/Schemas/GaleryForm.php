<?php

namespace App\Filament\Resources\Galeries\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GaleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('post_id')
                    ->relationship('post', 'judul')
                    ->searchable()
                    ->preload(),
                TextInput::make('position')
                    ->numeric(),
                Toggle::make('status')
                    ->required(),
            ]);
    }
}
