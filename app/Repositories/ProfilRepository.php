<?php

namespace App\Repositories;

use App\ProfilDemandeurEmploi, App\User;

use DB;

class ProfilRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $user;

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(
		ProfilDemandeurEmploi $profil,
		User $user)
	{
		$this->model = $profil;
		$this->user = $user;
	}


	public function ifProfilExist($idUser){

		$result = ProfilDemandeurEmploi::where('id_user',$idUser);

		if (!$result) 
   			return false;
		
		else
			return true;
	}


	
}
