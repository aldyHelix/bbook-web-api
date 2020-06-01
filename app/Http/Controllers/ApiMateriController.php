<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;

class ApiMateriController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function getMateri()
    {
        $data = Materi::with('kontenMateri')->with('quizMateri')->get();
        return response([
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $data
        ], 200);
    }
}
