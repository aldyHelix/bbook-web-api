<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriImage extends Model
{
    use HasFactory;
    protected $table = 'materi_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'materi_id',
        'image_name',
        'image_url',
        'description',
        'order'
    ];

    public function getPhoto()
    {
        return asset('uploads/materi/'.$this->image_url);
    }
}

