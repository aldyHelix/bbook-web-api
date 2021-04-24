<?php

namespace App\Repositories\Student;

use App\Repositories\Student\StudentInterface as StudentInterface;
use App\Models\Student;
use DB;

class StudentRepository implements StudentInterface
{
	protected $raw;
	protected $student;

	public function __construct(DB $raw, Student $student)
	{
		$this->raw = $raw;
		$this->student = $student;
	}

	public function getStudent()
	{
		return $this->student->get();
	}
}
