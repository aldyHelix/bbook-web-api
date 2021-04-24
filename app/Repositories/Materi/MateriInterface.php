<?php 

namespace App\Repositories\Materi;

interface MateriInterface {
	public function getMateri();
	public function getMateriById($id);
	public function getMateriOrderByLastAdded();
	public function getMateriByKey($key);
	public function getQuizByMateriId($id);
}