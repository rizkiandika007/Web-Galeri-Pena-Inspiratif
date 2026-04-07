<?php

namespace App\Filament\Resources\Fotos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class FotosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file')
                ->disk('public'),
                TextColumn::make('galery.post.judul')
                ->label('judul')
                ->formatStateUsing(function($state, $record) {
                    $postJudul = $record->galery?->post?->judul ?? 'Tanpa Post';
                    $fotoNumber = $record->id;
                    return "Gambar {$fotoNumber} {$postJudul}";
                })
                ->searchable(),
                TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
