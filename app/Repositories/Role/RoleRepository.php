<?php

namespace App\Repositories\Role;

use App\Repositories\Role\RoleInterface as RoleInterface;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface
{
	protected $role;

	public function __construct(Role $role)
	{
		$this->role = $role;
	}

	public function findById($id)
	{
		return $this->role->find($id);
	}

	public function getAllPagination($page, $ordered, $orderBy)
	{
		/**
		 * $page integer
		 * $ordered String 'ASC' or 'DESC'
		 * $orderBy String  ex: 'id'
		 */
		return $this->role->orderBy($orderBy, $ordered)->paginate($page);
	}

	public function getAllName()
	{
		return $this->role->pluck('name', 'name')->all();
	}
}
