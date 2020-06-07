<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $data['quizs'] = Quiz::with('materiQuiz')->get();
        return view('quiz.index', $data);
    }
    public function add()
    {
        return view('users.add-edit', ['edit' => false]);
    }
    public function insert(Request $request)
    {
        $data = $request->dt;

        if(Quiz::create($data))
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
        $data['users'] = Quiz::where('id', $id)->first();
        return view('users.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->dt;

        if(Quiz::where('id', $id)->update($data))
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Quiz'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update Quiz."));
        }
    }
    public function delete($id)
    {
        $dt = Quiz::findOrFail($id);
        if(!empty($dt))
        {
            Quiz::destroy($id);
            return redirect()->back()->withSuccess(__("Successfuly Deleted Quiz."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Deleted Quiz."));
        }
    }
}
