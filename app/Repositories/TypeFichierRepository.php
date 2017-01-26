<?php

namespace App\Repositories;

use App\TypeFichier;

use DB;
use DateTime;

class TypeFichierRepository extends BaseRepository
{


	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $typeFichier;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(TypeFichier $typeFichier)
	{
		$this->model = $typeFichier;
	
	}


	public function getTypeFichier($slug){

		//récupération de l'annonce
		$typeFichier = TypeFichier::where('type_fichier','=',$slug)->first();

		return $typeFichier;
	}


	
}
