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
		return $this->materi->with('materiGallery')->get();
	}
}
