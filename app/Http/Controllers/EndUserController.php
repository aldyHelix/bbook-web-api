<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\EndUser;
use App\User;

class EndUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        $data['users'] = User::get();
        return view('users.index', $data);
    }
    public function add()
    {
        return view('users.add-edit', ['edit' => false]);
    }
    public function insert(Request $request)
    {
        $data = $request->dt;
        $data['password'] = Hash::make($data['password']);

        if(User::create($data))
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
        $data['users'] = User::findOrFail($id)->first();
        return view('users.add-edit', ['edit' => true], $data);
    }
    public function update(Request $request, $id)
    {
        $data = $request->dt;
        $data['password'] = Hash::make($data['password']);

        if(User::findOrFail($id)->update($data))
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
        $dt = User::findOrFail($id);
        if(!empty($dt))
        {
            User::destroy($id);
            return redirect('end-user')->withSuccess(__("Successfuly Deleted User."));
        }
        else
        {
            return redirect('end-user')->withError(__("Failed Deleted User."));
        }
    }
}
