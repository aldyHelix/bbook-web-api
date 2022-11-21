<?php

namespace App\Repositories\Petunjuk;

use App\Repositories\Petunjuk\PetunjukInterface as PetunjukInterface;
use App\Models\Petunjuk;
use DB;

class PetunjukRepository implements PetunjukInterface
{
	protected $raw;
	protected $petunjuk;

	public function __construct(DB $raw, Petunjuk $petunjuk)
	{
		$this->raw = $raw;
		$this->petunjuk = $petunjuk;
	}

	public function getPetunjuk()
	{
		return $this->petunjuk->get();
	}

	public function getPetunjukById($id)
	{
		return $this->petunjuk->find($id);
	}

    public function getPetunjukSoal()
    {
        return $this->petunjuk->where('kode_petunjuk', 'soal')->get();
    }
}
