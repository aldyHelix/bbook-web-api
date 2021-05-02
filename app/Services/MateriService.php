<?php
namespace App\Services;

use App\Repositories\Materi\MateriInterface as MateriInterface;
use App\Models\Materi;

class MateriService
{
	protected $materiRepository;
	protected $materiModel;

	public function __construct(MateriInterface $materiRepository, Materi $materiModel)
	{
		$this->materiRepository = $materiRepository;
		$this->materiModel = $materiModel;
	}

	public function createMateri($request)
	{
		$request->validate([
			'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
	  ]);

	  $data = $request->dt;
	  $gambar = $request->file('gambar');
	  if($gambar != null){
			$nama_file1 = time()."_".$gambar->getClientOriginalName();
			$tujuan_upload = 'uploads/materi';
			$gambar->move($tujuan_upload,$nama_file1);
			$data['image'] = $nama_file1;
	  }

	  //dd($data);
	  if($this->materiModel->create($data))
	  {
			return true;
	  }
	  else
	  {
			return false;
	  }
	}

	public function updateMateri($request, $id)
	{
		$request->validate([
			'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
	  	]);

	  $data = $request->dt;
	  $gambar = $request->file('gambar');
	  if($gambar != null){
			$nama_file1 = time()."_".$gambar->getClientOriginalName();
			$tujuan_upload = 'uploads/materi';
			$gambar->move($tujuan_upload,$nama_file1);
			$data['gambar_materi'] = $nama_file1;
	  }

	  $getData = $this->materiRepository->getMateriById($id);

	  if($getData->update($data))
	  {
		  return true;
	  }
	  else
	  {
		  return false;
	  }
	}

	public function deleteMateri($id)
	{
		$materi = $this->materiRepository->getMateriById($id);

		if($materi->delete())
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function updateKonten($request, $id)
	{
		$konten = $request->dt['konten'];
		$getData = $this->materiRepository->getMateriById($id);

		if($getData->update(['konten' => $konten]))
	  {
		  return true;
	  }
	  else
	  {
		  return false;
	  }

	}
}