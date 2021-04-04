<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materis';

    public function getPhoto()
    {
        return asset('uploads/materi/'.$this->image);
    }
    public function defaultPhoto()
    {
        return asset('uploads/konten/blank.png');
    }
    public function materiGallery()
    {
        return $this->hasMany(MateriGallery::class, 'materi_id');
    }
}
