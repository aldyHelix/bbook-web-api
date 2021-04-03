<?php 

namespace App\Repositories\Role;

interface RoleInterface {
	public function getAllName();
	public function getAllPagination($page, $ordered, $orderBy);
	public function findById($id);
}