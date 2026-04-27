<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Dotswan\MapPicker\Fields\Map;
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
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('telepon')
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('latitude')
                    ->required()
                    ->readOnly(),  // ✅ Di-set otomatis oleh Map
                TextInput::make('longitude')
                    ->required()
                    ->readOnly(),  // ✅ Di-set otomatis oleh Map
                Map::make('location')
                    ->label('Lokasi')
                    ->defaultLocation(latitude: 40.4168, longitude: -3.7038)
                    ->showMarker()
                    ->draggable()           // ✅ Ganti clickable() → draggable()
                    ->tilesUrl("https://tile.openstreetmap.de/{z}/{x}/{y}.png")
                    ->zoom(12)
                    ->afterStateUpdated(function ($state, $set) {
                        $set('latitude', $state['lat']);
                        $set('longitude', $state['lng']);
                    })
                    ->columnSpanFull(),
            ]);
    }
}