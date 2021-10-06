<?php
namespace App\Services;

use App\Repositories\MateriVideo\MateriVideoInterface as MateriVideoInterface;
use App\Models\MateriVideo;

class MateriVideoService
{
	protected $materiVideoRepository;
	protected $materiVideoModel;

	public function __construct(MateriVideoInterface $materiVideoRepository, MateriVideo $materiVideoModel)
	{
		$this->materiVideoRepository = $materiVideoRepository;
		$this->materiVideoModel = $materiVideoModel;
	}

	public function create($request)
	{
		$data = $request->dt;

		if($this->materiVideoModel->create($data))
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
		$data = $request->dt;

		$getData = $this->materiVideoRepository->getMateriVideoById($id);

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
		$getData = $this->materiVideoRepository->getMateriVideoById($id);

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