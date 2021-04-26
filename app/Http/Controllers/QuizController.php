<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Quiz\QuizInterface;
use App\Services\MateriService;

class QuizController extends Controller
{
    protected $quizRepository;
    protected $quizService;

    public function __construct(QuizInterface $quizRepository, QuizService $quizService)
    {
        $this->quizService = $quizService;
        $this->quizRepository = $quizRepository;
        $this->middleware('auth');
    }
    public function show()
    {
        $data['quizs'] = $this->quizRepository->getQuiz();
        return view('quiz.index', $data);
    }
    public function add()
    {
        return view('users.add-edit', ['edit' => false]);
    }
    public function insert(Request $request)
    {
        $created = $this->quizService->createQuiz($request);

        if($created)
        {
            return redirect()->back()->withSuccess(__("Successfuly Add Quiz."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Quiz."));
        }
    }
    public function edit($id)
    {
        $data['users'] = $this->quizRepository->getQuizById($id);
        return view('users.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
        $updated = $this->quizService->updateQuiz($request, $id);

        if($updated)
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Quiz'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update Quiz."));
        }
    }
    public function destroy($id)
    {
        $deleted = $this->quizService->deleteQuiz($id);
        if($deleted)
        {
            return redirect()->back()->withSuccess(__("Successfuly Deleted Quiz."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Deleted Quiz."));
        }
    }
}
