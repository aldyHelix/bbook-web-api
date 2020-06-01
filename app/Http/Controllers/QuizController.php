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
        $data['password'] = Hash::make($data['password']);

        if(Enduser::create($data))
        {
            return redirect('end-user')->withSuccess(__("Successfuly Add User."));
        }
        else
        {
            return redirect('end-user')->withError(__("Failed Add User."));
        }
    }
    public function edit($id)
    {
        $data['users'] = EndUser::where('id', $id)->first();
        return view('users.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->dt;
        $data['password'] = Hash::make($data['password']);

        if(Enduser::where('id', $id)->update($data))
        {
            return redirect('end-user')->withSuccess(__('Successfuly Update '.$data['name']));
        }
        else
        {
            return redirect('end-user')->withError(__("Failed Update User."));
        }
    }
    public function delete($id)
    {
        $dt = EndUser::findOrFail($id);
        if(!empty($dt))
        {
            EndUser::destroy($id);
            return redirect('end-user')->withSuccess(__("Successfuly Deleted User."));
        }
        else
        {
            return redirect('end-user')->withError(__("Failed Deleted User."));
        }
    }
}
