<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quizs';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header',
        'question',
        'is_picture_quiz',
        'image',
        'answer_index',
        'order',
        'bab',
        'status',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
    ];

    public function getPhoto()
    {
        return asset('uploads/quiz/'.$this->image);
    }
    public function defaultPhoto()
    {
        return asset('uploads/konten/blank.png');
    }
}
