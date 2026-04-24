<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Schema;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Agenda')
                    ->required()
                    ->maxLength(255),
                
                DatePicker::make('tanggal_pelaksanaan')
                    ->label('Tanggal Pelaksanaan')
                    ->required(),
                
                Textarea::make('keterangan')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(6),
                
                FileUpload::make('thumbnail')
                    ->label('Foto Thumbnail')
                    ->disk('public')
                    ->directory('agendas')
                    ->visibility('public')
                    ->image()
                    ->maxSize(2048),

            ]);
    }
}
