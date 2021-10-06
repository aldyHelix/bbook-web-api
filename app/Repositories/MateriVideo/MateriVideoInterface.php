<?php 

namespace App\Repositories\MateriVideo;

interface MateriVideoInterface {
	public function getMateriVideo();
	public function getMateriVideoById($id);
	public function getMateriVideoByMateriId($id);
	public function getMateriVideoOrderByLastAdded();
	public function getMateriVideoOrderByOrderColumn($materi_id);
}