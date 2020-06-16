<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Materi;
use App\Quiz;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
   public $successStatus = 200;

    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
        // if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        //     $user = Auth::user();
        //     $success['token'] =  $user->createToken('nApp')->accessToken;
        //     return response()->json(['success' => $success], $this->successStatus);
        // }
        // else{
        //     return response()->json(['error'=>'Unauthorised'], 401);
        // }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    public function cekEmail(Request $request)
    {
        $email = $request->email;
        $data = User::where('email', $email)->first();
        if(empty($data)){
            return response()->json(201);
        }
        else {
            return response()->json([
            'message' => 'Email Already Taken!'
            ], 405);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    public function materi()
    {
        $data = Materi::with('kontenMateri')->with('quizMateri')->get();
        return response($data, 200);
    }
    public function getMateri($id)
    {
        $data = Materi::with('kontenMateri')->with('quizMateri')->with('quizMateri.hasOption')->findOrFail($id);
        return response($data, 200);
    }
    public function getMateriQuiz($id)
    {
        //id = materi id
        //item = quiz id
        $data = Quiz::where('materi_id', $id)->with('hasOption')->get();
        return response([
            'success' => true,
            'message' => 'get quiz from materi id' . $id,
            'data' => $data
        ]);
    }
}
