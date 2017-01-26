<?php

namespace App\Repositories;

use App\Annonce, App\User;

use App\Services\TestSlug;

use DB;
use DateTime;

class AnnonceRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $annonce;

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(Annonce $annonce,User $user,
								TestSlug $testSlug)
	{
		$this->model = $annonce;
		$this->user = $user;
		$this->testSlug = $testSlug;
	}


	public function getListeAnnonce($type = null){

		//requete de base: toutes les annonces
		$requete = "SELECT annonces.id_annonce AS id_annonce, annonces.created_at AS created_at, annonces.titre AS titre, 
							annonces.contenu AS contenu, annonces.active AS active, annonces.slug AS slug, 
							users.name AS nom,type_annonces.type_annonce AS type_annonce,categories.categorie AS categorie
							FROM annonces 
							INNER JOIN users 
							ON annonces.id_user = users.id
							INNER JOIN type_annonces
							ON annonces.id_type_annonce = type_annonces.id_type_annonce
							INNER JOIN categories
							ON annonces.id_categorie = categories.id_categorie";

		//recherche avec param
		if($type != null){

			//si c'est la vue web non authentifiée: liste des annonces validées
			if($type == 'web')
				$requete = $requete." WHERE annonces.active = 1";

			//sinon liste des annonces par utilisateur
			else
				$requete = $requete." WHERE users.id = ".$type;
		}
			
		//lancement de la requête
		$total = DB::select(DB::raw($requete));

		return ($total);	
	}


	public function getNumber($idUser = null)
	{

		$requete = "SELECT count(*) as nbre FROM annonces INNER JOIN users ON annonces.id_user = users.id";

		if($idUser == null)
			$total = DB::select(DB::raw($requete));

		else{

			$requete = $requete." WHERE users.id = ".$idUser;

			$total = DB::select(DB::raw($requete));
		}

		
		return ($total);		
	}


	public function show($slug){

		//récupération de l'annonce
		$annonce = $this->model->where('slug','=',$slug)->first();

		//récupération de l'utilisateur  associé
		$user_annonce = $this->model->find($annonce->id_annonce)->user;

		//récupération du type d'annonce associé
		$typ_annonce = $this->model->find($annonce->id_annonce)->type_annonce;

		return compact('annonce','user_annonce','typ_annonce');
	}


	public function store($inputs,$userId,$slugTypeAnnonce,
							$idTypeAnnonce,$idCategorie){

		//création du slug
		$slug = $slugTypeAnnonce.'_'.$inputs['titre'];
		$slug = str_slug($slug, "-");

		//vérification si le slug existe
		$slug = $this->testSlug->test($this->model,$slug);

		//création d'un objet Annonce
		$annonce = new Annonce;

		//enregistrement des champs
		$annonce->titre = $inputs['titre'];
        $annonce->contenu = $inputs['contenu'];
        $annonce->slug = $slug;
        $annonce->id_user = $userId;
        $annonce->id_type_annonce = $idTypeAnnonce;
        $annonce->id_categorie = $idCategorie;

        //sauvegarde dans la base
        $annonce->save();
	}


	public function update($inputs,$slug){

		//création du nouveau slug
		$newSlug = str_slug($inputs['titre'], "-");

		//modification du slug et vérification si celui-ci existe
		$newSlug = $this->testSlug->test($this->model,$newSlug);

		//récupération de l'annonce
		$annonce = $this->model->where('slug','=',$slug)->first();

		//enregistrement des champs modifiés
		$annonce->titre = $inputs['titre'];
        $annonce->contenu = $inputs['contenu'];
        $annonce->slug = $newSlug;

        //sauvegarde dans la base
        $annonce->save();

        return $newSlug;

	}


	public function updateActive($inputs, $slug){

		$annonce = $this->model->where('slug','=',$slug)->first();

		if($inputs['active'] == 'true')
    		$annonce->active = 1; 
    	else
    		$annonce->active = 0; 

    	$annonce->save();   

	}


	public function destroy($slug){

		//récupération de l'annonce
		$annonce = $this->model->where('slug','=',$slug)->first();

		//destruction de l'annonce
		$annonce->delete();
	}
}
