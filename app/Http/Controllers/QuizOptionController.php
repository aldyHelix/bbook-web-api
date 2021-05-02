<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuizOption;

class QuizOptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert(Request $request)
    {
        $data = $request->dt;
        if(QuizOption::create($data))
        {
            return redirect()->back()->withSuccess(__("Successfuly Add Quiz Option."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Add Quiz Option."));
        }
    }
    public function update(Request $request, $id)
    {
        $data = $request->dt;

        if(QuizOption::where('id', $id)->update($data))
        {
            return redirect()->back()->withSuccess(__('Successfuly Update Option'));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Update User."));
        }
    }
    public function delete($id)
    {
        $dt = QuizOption::findOrFail($id);
        if(!empty($dt))
        {
            QuizOption::destroy($id);
            return redirect()->back()->withSuccess(__("Successfuly Deleted User."));
        }
        else
        {
            return redirect()->back()->withError(__("Failed Deleted User."));
        }
    }
}
