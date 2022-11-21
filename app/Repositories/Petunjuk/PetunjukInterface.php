<?php

namespace App\Repositories\Petunjuk;

interface PetunjukInterface {
	public function getPetunjuk();
	public function getPetunjukById($id);
    public function getPetunjukSoal();
}
