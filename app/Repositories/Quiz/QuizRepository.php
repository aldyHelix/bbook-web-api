<?php

namespace App\Repositories\Quiz;

use App\Repositories\Quiz\QuizInterface as QuizInterface;
use App\Models\Quiz;
use DB;

class QuizRepository implements QuizInterface
{
	protected $raw;
	protected $quiz;

	public function __construct(DB $raw, Quiz $quiz)
	{
		$this->raw = $raw;
		$this->quiz = $quiz;
	}

	public function getQuiz()
	{
		return $this->quiz->get();
	}

    public function getQuizByBab($bab)
	{
		return $this->quiz->where('bab', $bab)->orderBy('order', 'ASC')->get();
	}

	public function getQuizById($id)
	{
		return $this->quiz->find($id);
	}
}
