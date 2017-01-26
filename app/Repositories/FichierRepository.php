<?php

namespace App\Repositories;

use App\Fichier;

use App\Services\TestSlug;

use DB;

use Carbon;

class FichierRepository extends BaseRepository
{


	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $fichier;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(Fichier $fichier,TestSlug $testSlug){

		$this->model = $fichier;
		$this->testSlug = $testSlug;
	}



	public function getListeFicchiers($typeFichier){

		$listeFichiers = DB::table('fichiers')
							->join('type_fichiers','fichiers.id_type_fichier','=','type_fichiers.id_type_fichier')
							->select('fichiers.nom AS nom','fichiers.nom_fichier AS nom_fichier','fichiers.description AS description','fichiers.slug AS slug','fichiers.created_at AS created_at')
							->where('type_fichiers.type_fichier', $typeFichier)
							->get();

		return $listeFichiers;
		
	}


	public function getSelectListeFichiers($slugTypeFichier){

		$listeFichiers = $this->getListeCategories($slugTypeFichier);
		$listeFichiers = collect($listeFichiers);

		$listeFichiersPlucked = $listeFichiers->pluck('nom','slug');

		return $listeFichiersPlucked;
	}


	public function show($slug){

		//récupération de l'annonce
		$fichier = $this->model->where('slug','=',$slug)->first();


		return compact('fichier');
	}


	public function store($inputs,$idTypeFichier,$nomFichier,$idUser){
	//public function store($inputs,$idTypeFichier){

		//création du slug
		$slug = str_slug($inputs['nom'], "-");

		//vérification si le slug existe
		$slug = $this->testSlug->test($this->model,$slug);

		//création d'une nouvelle catégorie
		$fichier = new Fichier;

		//enregistrement des champs
		$fichier->nom = $inputs['nom'];
		$fichier->nom_fichier = $nomFichier;
	    $fichier->description = $inputs['description'];
	    $fichier->slug = $slug;
	    $fichier->id_user = $idUser;
	    $fichier->id_type_fichier = $idTypeFichier;

	    //sauvegarde dans la base
	    $fichier->save();
	}

	public function edit($slug){

		//récupération de l'annonce
		//récupération de l'annonce
		$fichier = $this->model->where('slug','=',$slug)->first();

		//récupération de l'utilisateur  associé
		$user_fichier = $this->model->find($fichier->id_fichiers)->user;


		return compact('fichier','user_fichier','typeFichier');
	}


	public function update($inputs,$slug){

		//création du slug
		$newSlug = str_slug($inputs['nom'], "-");

		//modification du slug et vérification si celui-ci existe
		$newSlug = $this->testSlug->test($this->model,$newSlug);

		//récupération de l'annonce
		$fichier = $this->model->where('slug','=',$slug)->first();

		//enregistrement des champs modifiés
		$fichier->nom = $inputs['nom'];
	    $fichier->description = $inputs['description'];
	    $fichier->slug = $newSlug;

        //sauvegarde dans la base
        $fichier->save();

        return $newSlug;
	}


	public function destroy($slug){

		//récupération de l'annonce
		$fichier = $this->model->where('slug','=',$slug)->first();

		//destruction de l'annonce
		$fichier->delete();
	}


	private function getNomFichier($slug){

		//calcul d'un timestamp
		$now = Carbon::now()->timestamps;

		//ajout au nom du fichier
		$nomFichier = $now.'_'.$slug;

		//maximum nombre caractères nom du fichier
		$nomFichier = str_limit($nomFichier,50);

		return $nomFichier;
	}
}
