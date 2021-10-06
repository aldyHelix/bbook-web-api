<?php 

namespace App\Repositories\Quiz;

interface QuizInterface {
	public function getQuiz();
	public function getQuizById($id);
}