<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'questions';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_text',
        'order',
        'text_option_a',
        'text_option_b',
        'text_option_c',
        'text_option_d',
        'text_option_e',
        'point',
        'answer',
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
