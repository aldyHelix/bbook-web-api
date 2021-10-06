<?php
namespace App\Services;

use App\Repositories\MateriImage\MateriImageInterface as MateriImageInterface;
use App\Models\MateriImage;

class MateriImageService
{
	protected $materiImageRepository;
	protected $materiImageModel;

	public function __construct(MateriImageInterface $materiImageRepository, MateriImage $materiImageModel)
	{
		$this->materiImageRepository = $materiImageRepository;
		$this->materiImageModel = $materiImageModel;
	}

	public function create($request)
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
				$data['image_url'] = $nama_file1;
		}

		if($this->materiImageModel->create($data))
		{
				return true;
		}
		else
		{
				return false;
		}
	}

	public function update($request, $id)
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
				$data['image_url'] = $nama_file1;
		}

		$getData = $this->materiImageRepository->getMateriImageById($id);

		if($getData->update($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function delete($id)
	{
		$getData = $this->materiImageRepository->getMateriImageById($id);

		if($getData->delete())
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
}