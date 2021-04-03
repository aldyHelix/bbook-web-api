<?php

namespace App\Repositories\Permission;

use App\Repositories\Permission\PermissionInterface as PermissionInterface;
use Spatie\Permission\Models\Permission;
use DB;

class PermissionRepository implements PermissionInterface
{
	protected $raw;
	protected $permission;

	public function __construct(DB $raw, Permission $permission)
	{
		$this->raw = $raw;
		$this->permission = $permission;
	}

	public function getPermission()
	{
		return $this->permission->get();
	}

	public function getJoinRolePermissionById($id)
	{
		return $this->permission
			->join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
			->where("role_has_permissions.role_id",$id)
			->get();
	}

	public function RawGetRolePermissionById($id)
	{
		return $this->raw->table("role_has_permissions")->where("role_has_permissions.role_id",$id)
			->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
			->all();
	}
}
