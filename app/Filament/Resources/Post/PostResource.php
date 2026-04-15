<?php

namespace App\Filament\Resources\Post;

use App\Filament\Resources\Post\Pages\CreatePost;
use App\Filament\Resources\Post\Pages\EditPost;
use App\Filament\Resources\Post\Pages\ListPost;
use App\Filament\Resources\Post\Schemas\PostForm;
use App\Filament\Resources\Post\Tables\PostTable;
use App\Models\Post;
use BackedEnum;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrow-up-on-square-stack';

    // manajemen konten
    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $recordTitleAttribute = 'judul';

    public static function form(Schema $schema): Schema
{
    return PostForm::configure($schema);
}

    public static function table(Table $table): Table
    {
        return PostTable::configure($table);
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
            'index' => ListPost::route('/'),
            'create' => CreatePost::route('/create'),
            'edit' => EditPost::route('/{record}/edit'),
        ];
    }
}
