<?php

namespace App\Repositories;

use App\User, App\Role;

use DB;

class UserRepository extends BaseRepository
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
   	 * @param  App\Models\User $user
	 * @param  App\Models\Role $role
	 * @return void
	 */
	public function __construct(
		User $user, 
		Role $role)
	{
		$this->model = $user;
		$this->role = $role;
	}


	public function getNumber($type)
	{

		if($type == 'total'){

			$total = $this->model->count();
		}

		else
			$total =  DB::select('SELECT count(*) as nbre FROM users INNER JOIN roles ON users.id_role = roles.id_role WHERE roles.slug = ?',[$type]);

		return ($total);
	}


	public function getUser($idUser){

		$user = DB::table('users')
				->where('id', '=', $idUser)
				->get();

		return $user;
	}


	public function updateUser($idUser,$data){

		$user = $this->model->find($idUser);

		$user->name = $data['pseudo'];
		$user->email = $data['email'];

		$user->save();
	}
}
