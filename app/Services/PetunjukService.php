<?php
namespace App\Services;

use App\Repositories\Petunjuk\PetunjukInterface as PetunjukInterface;
use App\Models\Petunjuk;

class PetunjukService
{
    protected $PetunjukRepository;
    protected $PetunjukModel;

    public function __construct(PetunjukInterface $PetunjukRepository, Petunjuk $PetunjukModel)
    {
        $this->PetunjukRepository = $PetunjukRepository;
        $this->PetunjukModel = $PetunjukModel;
    }

	 public function createPetunjuk($request)
	 {
		$data = $request->dt;

		if($this->PetunjukModel->create($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function updatePetunjuk($request, $id)
	 {
		$getData = $this->PetunjukRepository->getPetunjukById($id);
		$data = $request->dt;

		if($getData->update($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function deletePetunjuk($id)
	 {
		 $Petunjuk = $this->PetunjukRepository->getPetunjukById($id);

		 if($Petunjuk->delete())
		 {
			return true;
		 }
		 else
		 {
			return false;
		 }
	 }
}
