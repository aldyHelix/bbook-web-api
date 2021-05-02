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
        'materi_id',
        'question',
        'is_picture_quiz',
        'answer'
    ];

    public function materiQuiz()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function hasOption()
    {
        return $this->hasMany(QuizOption::class);
    }
}
