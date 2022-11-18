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

    public function getQuizByBab($bab)
    {
        /**
         * {
            *"id": 1,
            *"header": "Perhatikan gambar di bawah ini!",
            *"question":
                *"Bagaimana pendapatmu tentang manusia dan dinosaurus yang hidup berdampingan sebagaimana di film-film?",
            *"image": "images/quiz/Picture1.png",
            *"options": [
                * 'Itu benar karena ditemukannya fosil manusia yang sezaman dengan fosil dinosaurus.',
                *'Itu tidak benar karena keduanya hidup pada zaman yang berbeda.',
                *'Itu benar karena manusia zaman dahulu memiliki tinggi yang sangat besar yang setara dengan dinosaurus.',
                *'Itu tidak benar karena manusia purba berusaha menjauhi lokasi adanya dinosaurus hidup agar tetap aman.',
                *'Itu tidak benar karena tidak ada bukti yang menunjukkan adanya dinosaurus di masa lalu.'
            *],
            *"answer_index": 1,
            *},
         */
        $data = $this->quizRepository->getQuizByBab($bab);

        $data->map(function($item){
            $item['option'] = [
                $item['option_a'],
                $item['option_b'],
                $item['option_c'],
                $item['option_d'],
                $item['option_e'],
            ];

            unset($item['option_a']);
            unset($item['option_b']);
            unset($item['option_c']);
            unset($item['option_d']);
            unset($item['option_e']);

            return $item;
        });

        return response([
            'success' => true,
            'message' => 'Quiz by id',
            'data' => $data
        ], 200);
    }
}
