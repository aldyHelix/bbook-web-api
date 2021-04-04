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
}