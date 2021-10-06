<?php

namespace App\Repositories\MateriImage;

use App\Repositories\MateriImage\MateriImageInterface as MateriImageInterface;
use App\Models\MateriImage;
use DB;

class MateriImageRepository implements MateriImageInterface
{
	protected $raw;
	protected $materi_image;

	public function __construct(DB $raw, MateriImage $materi_image)
	{
		$this->raw = $raw;
		$this->materi = $materi_image;
	}

	public function getMateriImage()
	{
		return $this->materi->get();
	}

	public function getMateriImageById($id)
	{
		return $this->materi->find($id);
	}

	public function getMateriImageOrderByLastAdded()
	{
		return $this->materi->orderBy('created_at', 'desc')->take(10)->get();
	}

	public function getMateriImageOrderByOrderColumn($materi_id)
	{
		return $this->materi->where('materi_id', $materi_id)->orderBy('order', 'asc')->get();
	}
}
