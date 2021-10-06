<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriVideo extends Model
{
    use HasFactory;
    protected $table = 'materi_videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'materi_id',
        'video_name',
        'video_url',
        'order'
    ];

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
}
