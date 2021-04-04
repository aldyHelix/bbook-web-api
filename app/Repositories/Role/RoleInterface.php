<?php 

namespace App\Repositories\Role;

interface RoleInterface {
	public function findById($id);
	public function getAllPagination($page, $ordered, $orderBy);
	public function getAllName();
}