<?php 

namespace App\Repositories\MateriImage;

interface MateriImageInterface {
	public function getMateriImage();
	public function getMateriImageById($id);
	public function getMateriImageOrderByLastAdded();
	public function getMateriImageOrderByOrderColumn($materi_id);
}