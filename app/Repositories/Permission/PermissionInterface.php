<?php 

namespace App\Repositories\Permission;

interface PermissionInterface {
	public function getPermission();
	public function getJoinRolePermissionById($id);
	public function RawGetRolePermissionById($id);
}