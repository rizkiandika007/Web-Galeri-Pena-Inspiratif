<?php

namespace App\Filament\Resources\Fotos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class FotoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('galery_id')
                ->required()
                ->relationship('galery','id')
                ->getOptionLabelFromRecordUsing(fn($record) => $record->post->judul ?? "Galery #{$record->id}")
                ->searchable()
                ->preload(),
                FileUpload::make('file')
                ->required(),
                TextInput::make('judul'),
            ]);
    }
}
