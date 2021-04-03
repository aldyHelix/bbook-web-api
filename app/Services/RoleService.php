<?php
namespace App\Services;

use App\Repositories\Role\RoleInterface as RoleInterface;
use App\Models\Role;

class RoleService
{
	protected $roleRepository;
	protected $roleModel;

	public function __construct(RoleInterface $roleRepository, Role $roleModel)
	{
		$this->roleRepository = $roleRepository;
		$this->roleModel = $roleModel;
	}

 	public function create($input)
 	{
		$role = $this->roleModel->create($input);
		
		return $role;
 	}

	public function update($input, $id)
	{
		$role = $this->roleRepository->findById($id);
		$role->update($input);
		
		return $role;
	}

	public function delete($id)
	{
		$role = $this->roleRepository->findById($id);
		$role->delete();
		
		return 'Success delete data!';
	}
}