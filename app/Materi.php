<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $guarded = [];
    protected $table = 'materis';
    public function getPhoto()
    {
        return asset('uploads/materi/'.$this->gambar_materi);
    }
    public function defaultPhoto()
    {
        return asset('uploads/konten/blank.png');
    }
    public function kontenMateri()
    {
        return $this->hasMany(Konten::class, 'materi_id');
    }
    public function quizMateri()
    {
        return $this->hasMany(Quiz::class);
    }
    public function quizHasOption()
    {
        return $this->hasManyThrough(QuizOption::class, Quiz::class);
    }
}
