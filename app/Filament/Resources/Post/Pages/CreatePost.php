<?php

namespace App\Filament\Resources\Post\Pages;

use App\Filament\Resources\Post\PostResource;
use App\Models\Galery;
use App\Models\Foto;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
    protected function afterCreate(): void 
    {
        $photos = $this->data['photos'] ?? [];

        if (!empty($photos)) {
            //bust gslery otomstid untuk podt ini
            $galery = Galery::create([
                'post_id' => $this->record->id,
                'position' => 1,
                'status' => true,
            ]);

            //buat record foto untuk setiap file
            foreach ($photos as $photo) {
                Foto::create([
                    'galery_id' => $galery->id,
                    'file' => $photo,
                    'judul' => null,
                ]);
            }
        }
    }
}
