<?php 

namespace App\Repositories\Quiz;

interface QuizInterface {
	public function getQuiz();
	public function getQuizById($id);
	public function getQuizByMateriId($materi_id);
}