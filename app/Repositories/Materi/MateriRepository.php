<?php

namespace App\Repositories\Materi;

use App\Repositories\Materi\MateriInterface as MateriInterface;
use App\Models\Materi;
use DB;

class MateriRepository implements MateriInterface
{
	protected $raw;
	protected $materi;

	public function __construct(DB $raw, Materi $materi)
	{
		$this->raw = $raw;
		$this->materi = $materi;
	}

	public function getMateri()
	{
		return $this->materi->get();
	}

	public function getMateriById($id)
	{
		return $this->materi->find($id);
	}

	public function getMateriOrderByLastAdded()
	{
		return $this->materi->orderBy('created_at', 'desc')->get();
	}

	public function getMateriByKey($key)
	{
		return $this->materi->where('name', $key)
			->orWhere('name', 'like', '%' . $key . '%')->get();
	}

	public function getQuizByMateriId($id)
	{
		return $this->materi->find($id)->quiz()->get();
	}
}
