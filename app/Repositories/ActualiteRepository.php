<?php

namespace App\Repositories;

use App\Actualite, App\User;

use App\Services\TestSlug;

use DB;
use DateTime;

class ActualiteRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $actualite;

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(Actualite $actualite,User $user,
								TestSlug $testSlug)
	{
		$this->model = $actualite;
		$this->user = $user;
		$this->testSlug = $testSlug;
	}


	public function getListeActualites(){

		$listeActualites= DB::table('actualites')
							->join('users','actualites.id_user','=','users.id')
							->select('actualites.id_actualite AS id_actualite','actualites.created_at AS created_at','actualites.titre AS titre',
									'actualites.contenu AS contenu','actualites.active AS active','actualites.slug AS slug','users.name AS nom ')
							->get();
		
		return ($listeActualites);	
	}


	public function getNumber($idUser = null)
	{

		$requete = "SELECT count(*) as nbre FROM actualites INNER JOIN users ON actualites.id_actualite = users.id";

		if($idUser == null)
			$total = DB::select($requete);

		else{

			$requete = $requete." WHERE users.id = ?";

			$total = DB::select($requete,[$idUser]);
		}

		return ($total);		
	}


	public function show($slug){

		//récupération de l'annonce
		$actualite = $this->model->where('slug','=',$slug)->first();

		//récupération de l'utilisateur  associé
		$user_actualite = $this->model->find($actualite->id_actualite)->user;

		return compact('actualite','user_actualite');
	}


	public function store($inputs,$userId){

		//création du slug
		$slug = str_slug($inputs['titre'], "-");

		//vérification si le slug existe
		$slug = $this->testSlug->test($this->model,$slug);

		//création d'un objet Annonce
		$actualite = new Actualite;

		//enregistrement des champs
		$actualite->titre = $inputs['titre'];
        $actualite->contenu = $inputs['contenu'];
        $actualite->slug = $slug;
        $actualite->id_user = $userId;

        //sauvegarde dans la base
        $actualite->save();
	}


	public function update($inputs,$slug){

		//stripslashes sur le contenu
		$inputs['contenu'] = stripslashes($inputs['contenu']);

		//création du nouveau slug
		$newSlug = str_slug($inputs['titre'], "-");

		//modification du slug et vérification si celui-ci existe
		$newSlug = $this->testSlug->test($this->model,$newSlug);

		//récupération de l'annonce
		$actualite = $this->model->where('slug','=',$slug)->first();

		//enregistrement des champs modifiés
		$actualite->titre = $inputs['titre'];
        $actualite->contenu = $inputs['contenu'];
        $actualite->slug = $newSlug;

        //sauvegarde dans la base
        $actualite->save();

        return $newSlug;

	}


	public function updateActive($inputs, $slug){

		$actualite = $this->model->where('slug','=',$slug)->first();
    	$actualite->active = $inputs['active'] == 'true'; 
    	$actualite->save();   

	}


	public function destroy($slug){

		//récupération de l'annonce
		$actualite = $this->model->where('slug','=',$slug)->first();

		//destruction de l'annonce
		$actualite->delete();
	}
}
