<?php

namespace App\Repositories\User;

use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function findById($id)
	{
		return $this->user->find($id);
	}

	public function getAllPagination($page, $ordered, $orderBy)
	{
		/**
		 * $page integer
		 * $ordered String 'ASC' or 'DESC'
		 * $orderBy String  ex: 'id'
		 */
		return $this->user->orderBy($orderBy, $ordered)->paginate($page);
	}

	public function getAllName()
	{
		return $this->user->all();
	}
}
