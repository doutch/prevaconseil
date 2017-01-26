<?php

namespace App\Repositories;

use App\Categorie;

use App\Services\TestSlug;

use DB;
use DateTime;

class CategorieRepository extends BaseRepository
{


	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $categorie;


	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(Categorie $categorie,TestSlug $testSlug){

		$this->model = $categorie;
		$this->testSlug = $testSlug;
	}


	public function getCategorie($slug){

		//récupération de l'annonce
		$categorie = Categorie::where('slug','=',$slug)->first();

		return $categorie;
	}


	public function getListeCategories($slugTypeCategorie){

		$listeCategories = DB::table('categories')
							->join('type_categories','categories.id_type_categorie','=','type_categories.id_type_categorie')
							->select('categories.categorie AS nom','categories.description AS description','categories.slug AS slug')
							->where('type_categories.type_categorie', $slugTypeCategorie)
							->get();

		return $listeCategories;
		
	}


	public function getSelectListeCategorie($slugTypeCategorie){

		$listeCategories = $this->getListeCategories($slugTypeCategorie);
		$listeCategories = collect($listeCategories);

		$listeCategoriesPlucked = $listeCategories->pluck('nom','slug');

		return $listeCategoriesPlucked;
	}


	public function show($slug){

		//récupération de l'annonce
		$categorie = $this->model->where('slug','=',$slug)->first();


		return compact('categorie');
	}


	public function store($inputs,$slugTypeCategory,$idTypeCategorie){

		//création du slug
		$slug = $inputs['nom']."_".$slugTypeCategory;
		$slug = str_slug($slug, "-");

		//vérification si le slug existe
		$slug = $this->testSlug->test($this->model,$slug);

		//création d'une nouvelle catégorie
		$categorie = new Categorie;

		//enregistrement des champs
		$categorie->categorie = $inputs['nom'];
	    $categorie->description = $inputs['description'];
	    $categorie->slug = $slug;
	    $categorie->id_type_categorie = $idTypeCategorie;

	    //sauvegarde dans la base
	    $categorie->save();
	}


	public function update($inputs,$slug){

		//création du nouveau slug
		//création du slug
		$newSlug = $inputs['nom']."_".$slug;
		$newSlug = str_slug($newSlug , "-");

		//modification du slug et vérification si celui-ci existe
		$newSlug = $this->testSlug->test($this->model,$newSlug);

		//récupération de l'annonce
		$categorie = $this->model->where('slug','=',$slug)->first();

		//enregistrement des champs modifiés
		$categorie->categorie = $inputs['nom'];
        $categorie->description = $inputs['contenu'];
        $categorie->slug = $newSlug;

        //sauvegarde dans la base
        $categorie->save();

        return $newSlug;

	}


	public function destroy($slug){

		//récupération de l'annonce
		$categorie = $this->model->where('slug','=',$slug)->first();

		//destruction de l'annonce
		$categorie->delete();
	}
}
