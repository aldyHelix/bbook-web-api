<?php
namespace App\Services;

use App\Repositories\User\UserInterface as UserInterface;
use App\Models\User;

class UserService
{
	protected $userRepository;
	protected $userModel;

	public function __construct(UserInterface $userRepository, User $userModel)
	{
		$this->userRepository = $userRepository;
		$this->userModel = $userModel;
	}

 	public function create($input)
 	{
      $input['password'] = Hash::make($input['password']);
		$user = $userModel->create($input);
		
		return $user;
 	}

	public function update($input, $id)
	{
		if(!empty($input['password'])){ 
			$input['password'] = Hash::make($input['password']);
	  	}else{
			$input = Arr::except($input,array('password'));    
	  	}

		$user = $this->userRepository->findById($id);
		$user->update($input);
		
		return $user;
	}

	public function delete($id)
	{
		$user = $this->userRepository->findById($id);
		$user->delete();
		
		return 'Success delete data!';
	}
}