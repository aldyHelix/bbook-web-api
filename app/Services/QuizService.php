<?php
namespace App\Services;

use App\Repositories\Quiz\QuizInterface as QuizInterface;
use App\Models\Quiz;

class QuizService
{
    protected $quizRepository;
    protected $quizModel;

    public function __construct(QuizInterface $quizRepository, Quiz $quizModel)
    {
        $this->quizRepository = $quizRepository;
        $this->quizModel = $quizModel;
    }

	 public function createQuiz($request)
	 {
		$data = $request->dt;

		if($this->quizModel->create($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function updateQuiz($request, $id)
	 {
		$getData = $this->quizRepository->getQuizById($id);
		$data = $request->dt;

		if($getData->update($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function deleteQuiz($id)
	 {
		 $quiz = $this->quizRepository->getQuizById($id);

		 if($quiz->delete())
		 {
			return true;
		 }
		 else
		 {
			return false;
		 }
	 }
}