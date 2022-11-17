<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table = 'materis';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_materi',
        'header',
        'konten',
        'qr_code',
        'video_stream',
        'image',
        'status',
        'order',
        'bab'
    ];

    public function getPhoto()
    {
        return asset('uploads/materi/'.$this->image);
    }
    public function defaultPhoto()
    {
        return asset('uploads/konten/blank.png');
    }

    public function quizMateri()
    {
        return $this->hasMany(Quiz::class, 'id');
    }
    public function quizHasOption()
    {
        return $this->hasManyThrough(QuizOption::class, Quiz::class);
    }

    public function getYoutubeID()
    {
        $url = $this->video_stream;
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
        if (!empty($match)){
            return $match[1];
        }
        else
        {
            return $match[1] = null;
        }
    }

    public function materiVideo()
    {
        return $this->hasMany(MateriVideo::class, 'materi_id','id')->orderBy('order');
    }

    public function materiImage()
    {
        return $this->hasMany(MateriImage::class, 'materi_id', 'id')->orderBy('order');
    }
}
