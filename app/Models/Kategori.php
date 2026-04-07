<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //mendaftarkan kolom yang boleh diisi
    protected $fillable = ['judul'];
    //relasi ke tabel post 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
