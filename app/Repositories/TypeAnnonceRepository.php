<?php

namespace App\Repositories;

use App\TypeAnnonce;

use DB;
use DateTime;

class TypeAnnonceRepository extends BaseRepository
{


	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $typeAnnonce;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(TypeAnnonce $typeAnnonce)
	{
		$this->model = $typeAnnonce;
	
	}


	public function getTypeAnnonce($slug){

		//récupération de l'annonce
		$typeAnnonce = TypeAnnonce::where('type_annonce','=',$slug)->first();

		return $typeAnnonce;
	}


	
}
