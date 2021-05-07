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
		return $this->materi->orderBy('created_at', 'desc')->take(10)->get();
	}

	public function getMateriByKey($key)
	{
		return $this->materi->where('nama_materi', $key)
			->orWhere('nama_materi', 'like', '%' . $key . '%')->get();
	}

	public function getMateriByQrKey($key)
	{
		return $this->materi->where('qr_code', $key)
			->orWhere('qr_code', 'like', '%' . $key . '%')->first();
	}

	public function getQuizByMateriId($id)
	{
		return $this->materi->find($id)->quiz()->get();
	}
}
