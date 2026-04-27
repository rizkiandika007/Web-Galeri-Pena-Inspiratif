<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =['judul', 'isi', 'foto','email','telepon','alamat','latitude','longitude'];
}
