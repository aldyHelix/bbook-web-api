<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Student\StudentInterface as StudentInterface;

class StudentAuthController extends Controller
{
    private $studentRepository;

    public function __construct(StudentInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function login()
    {

    }

    public function register()
    {

    }

    public function checkEmail()
    {

    }

    public function logout()
    {
        
    }

    public function getStudentById($id)
    {

    }
}
