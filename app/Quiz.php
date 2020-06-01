<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];
    protected $table = 'quiz';

    public function materiQuiz()
    {
        return $this->belongsTo(Materi::class, 'materi_id');
    }
    public function hasOption()
    {
        return $this->hasMany(QuizOption::class);
    }
}
