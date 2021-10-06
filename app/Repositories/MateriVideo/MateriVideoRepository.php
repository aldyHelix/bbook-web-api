<?php

namespace App\Repositories\MateriVideo;

use App\Repositories\MateriVideo\MateriVideoInterface as MateriVideoInterface;
use App\Models\MateriVideo;
use DB;

class MateriVideoRepository implements MateriVideoInterface
{
	protected $raw;
	protected $materi_video;

	public function __construct(DB $raw, MateriVideo $materi_video)
	{
		$this->raw = $raw;
		$this->materi = $materi_video;
	}

	public function getMateriVideo()
	{
		return $this->materi->get();
	}

	public function getMateriVideoById($id)
	{
		return $this->materi->find($id);
	}

	public function getMateriVideoByMateriId($id)
	{
		return $this->materi->where('materi_id', $id)->get();
	}

	public function getMateriVideoOrderByLastAdded()
	{
		return $this->materi->orderBy('created_at', 'desc')->take(10)->get();
	}

	public function getMateriVideoOrderByOrderColumn($materi_id)
	{
		return $this->materi->where('materi_id', $materi_id)->orderBy('order', 'asc')->get();
	}
}
