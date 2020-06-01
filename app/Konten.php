<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Materi;

class Konten extends Model
{
    protected $guarded = ['_token', '_method'];
    protected $table = 'kontens';
    public function getPhoto()
    {
        return asset('uploads/konten/'.$this->gambar_konten);
    }

    public function kontenMateri()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
}
