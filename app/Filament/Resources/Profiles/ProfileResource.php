<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\CreateProfile;
use App\Filament\Resources\Profiles\Pages\EditProfile;
use App\Filament\Resources\Profiles\Pages\ListProfiles;
use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function canCreate(): bool
    {
        return Profile::count() === 0;
    }

    public static function getNavigationUrl(): string
    {
        $record = Profile::first();
        if (!$record) {
            $record = Profile::create([
                'judul' => 'Profil Sekolah',
                'isi' => 'Profil Sekolah',
            ]);
        }
        return static::getUrl('edit', ['record' => $record]);
    }
    public static function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProfiles::route('/'),
            'edit' => EditProfile::route('/{record}/edit'),
        ];
    }
}
