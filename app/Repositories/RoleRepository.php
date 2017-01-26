<?php

namespace App\Repositories;

use App\Role;

use DB;

class RoleRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $role;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(Role $role)
	{
		$this->model = $role;
	
	}


	public function getListeRolesSansAdmin(){

		//récupération de l'annonce
		$listeRole = $this->model->where('slug','!=','admin')->pluck('role','id_role');

		return $listeRole;
	}	
}
