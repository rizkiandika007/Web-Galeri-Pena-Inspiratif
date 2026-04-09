<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required(),
                FileUpload::make('foto')
                    ->image()
                    ->directory('profiles')
                    ->maxSize(2048)
                    ->columnSpanFull(),
                RichEditor::make('isi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
