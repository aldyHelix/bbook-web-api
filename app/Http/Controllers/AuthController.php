<?php

namespace App\Http\Controllers;

use App\User;
use App\EndUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        //$this->middleware('cors');
    }
    public function register(Request $request)
    {

    }
    public function login(Request $request)
    {

    }
    public function logout(Request $request)
    {

    }
    //
}
