<?php

namespace App\Repositories;

use App\TypeCategorie;

use DB;
use DateTime;

class TypeCategorieRepository extends BaseRepository
{


	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $typeCategorie;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(TypeCategorie $typeCategorie)
	{
		$this->model = $typeCategorie;
	
	}


	public function getTypeCategorie($slug){

		//récupération de l'annonce
		$typeCategorie = TypeCategorie::where('slug','=',$slug)->first();

		return $typeCategorie;
	}


	
}
