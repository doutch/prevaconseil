<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\CategorieRepository;

use App\Repositories\TypeCategorieRepository;

class CategorieController extends Controller
{
   /**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(CategorieRepository $categorieGestion,TypeCategorieRepository $typeCategorieGestion)
    {
		$this->categorieGestion = $categorieGestion;

		$this->typeCategorieGestion = $typeCategorieGestion;
    }


    public function index(Request $request,$slugTypeCategorie){

    	 //liste des catégories 
        $listeCategories = $this->categorieGestion->getListeCategories($slugTypeCategorie);

    	return view('dashboard.categorie_liste',['liste_categories'=> $listeCategories,'typeCategorie'=> $slugTypeCategorie]);
    }


    public function show($slug){

        $result = $this->categorieGestion->show($slug);

        return view('dashboard.categorie_show',$result);
    }


     public function create($slugTypeCategorie){

        return view('dashboard.categorie_creation',['typeCategorie'=> $slugTypeCategorie]);
    }


    public function store(Request $request,$slugTypeCategorie){

    	//Type de la catégorie
    	$typeCategorie = $this->typeCategorieGestion->getTypeCategorie($slugTypeCategorie);

    	if(!$typeCategorie)
    		return redirect()->back()->with('retour', "Une erreur s'est produite lors de l'enregistrement des données !!!");

    	else{

    		//enregistrement de l'annonce
        	$this->categorieGestion->store($request->all(),$slugTypeCategorie,$typeCategorie->id_type_categorie);

        	return redirect()->back()->with('retour', "Votre catégorie a bien été enregistrée !");
    	}
    }


   public function edit($slug){

        $result = $this->categorieGestion->show($slug);

        return view('dashboard.categorie_edit',$result);
    }


    public function update(Request $request,$slugTypeCategorie){

        //enregistrement de l'annonce et récupération du nouveau slug
        $newSlug = $this->categorieGestion->update($request->all(),$slugTypeCategorie);

        return redirect()->route('categorie.edit',$newSlug)->with('retour', 'Votre annonce a bien été modifiée !');
    }


    public function destroy($slug,$slugTypeCategorie){

        //Type de la catégorie
        $typeCategorie = $this->typeCategorieGestion->getTypeCategorie($slugTypeCategorie);

         //destruction de l'annonce
        $this->categorieGestion->destroy($slug);

        return redirect()->route('categorie.liste',$typeCategorie->type_categorie)->with('retour', 'Votre catégorie a bien été supprimée !');
       
    }
}
