<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['judul', 'kategori_id', 'isi', 'user_id', 'status'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function galeries()
    {
        return $this->hasMany(Galery::class);
    }
}
