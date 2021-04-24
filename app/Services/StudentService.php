<?php
namespace App\Services;

use App\Repositories\Student\StudentInterface as StudentInterface;
use App\Models\Student;

class StudentService
{
	protected $studentRepository;
	protected $studentModel;

	public function __construct(StudentInterface $studentRepository, Student $studentModel)
	{
		$this->studentRepository = $studentRepository;
		$this->studentModel = $studentModel;
	}
}