<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\Quiz\QuizInterface as QuizInterface;

class QuizController extends Controller
{
    private $quizRepository;

    public function __construct(QuizInterface $quizRepository)
    {
        $this->quizRepository = $quizRepository;
    }

    public function index()
    {
        $data = $this->quizRepository->getQuiz();

        return response([
            'success' => true,
            'message' => 'list all Quiz',
            'data' => $data
        ], 200);
    }

    public function getQuizById($id)
    {
        $data = $this->quizRepository->getQuizById($id);

        return response([
            'success' => true,
            'message' => 'Quiz by id',
            'data' => $data
        ], 200);
    }

    public function getQuizByMateriId($materi_id)
    {
        $data = $this->quizRepository->getQuizByMateriId($materi_id);

        return response([
            'success' => true,
            'message' => 'Quiz by id',
            'data' => $data
        ], 200);
    }
}
