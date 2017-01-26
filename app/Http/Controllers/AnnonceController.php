<?php

namespace App\Http\Controllers;

use App\Repositories\AnnonceRepository;

use App\Repositories\CategorieRepository;

use App\Repositories\TypeAnnonceRepository;

use Illuminate\Http\Request;


class AnnonceController extends Controller
{

	/**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $annonce_gestion;


	/**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(AnnonceRepository $annonceGestion,CategorieRepository $categorieGestion,
                                TypeAnnonceRepository $typeAnnonceGestion)
    {
		$this->annonceGestion = $annonceGestion;
        $this->categorieGestion = $categorieGestion;
        $this->typeAnnonceGestion = $typeAnnonceGestion;
    }


    public function indexWeb(Request $request){
 
        $listeAnnonces = $this->annonceGestion->getListeAnnonce('web');
        
        return view('annonce_liste',['liste_annonces'=> $listeAnnonces]);
    }


    public function indexAuth(Request $request){

        //si c'est un administrateur
        if (session('statut') === 'admin')
            $listeAnnonces = $this->annonceGestion->getListeAnnonce();
        
        //sinon utilisateur
        else
            $listeAnnonces = $this->annonceGestion->getListeAnnonce($request->user()->id);

        return view('dashboard.annonce_liste',['liste_annonces'=> $listeAnnonces]);
    }

    public function show($slug){

        $result = $this->annonceGestion->show($slug);

        return view('dashboard.annonce_show',$result);
    }


    public function showWeb($slug){

        $result = $this->annonceGestion->show($slug);

        return view('annonce_show',$result);
    }


    public function create($typeAnnonce){

         //liste des catégories 
        $listeCategories = $this->categorieGestion->getSelectListeCategorie('annonce');

    	return view('dashboard.annonce_creation',['liste_categories'=> $listeCategories,'typeAnnonce'=> $typeAnnonce]);
    }


    public function store(Request $request,$slugTypeAnnonce){

        $inputs = $request->all();

        //récupération de l'objet type annonce
        $typeAnnonce = $this->typeAnnonceGestion->getTypeAnnonce($slugTypeAnnonce);

        //récupération de l'objet type catégorie
        $categorie = $this->categorieGestion->getCategorie($inputs['categorie']);

        //enregistrement de l'annonce
        $this->annonceGestion->store($request->all(),$request->user()->id,$slugTypeAnnonce,
                                    $typeAnnonce->id_type_annonce,$categorie->id_categorie);

        return redirect()->back()->with('retour', 'Votre annonce a bien été enregistrée !');
    }


    public function edit($slug){

        $result = $this->annonceGestion->show($slug);

        return view('dashboard.annonce_edit',$result);
    }


    public function update(Request $request,$slug){

        //enregistrement de l'annonce et récupération du nouveau slug
        $newSlug = $this->annonceGestion->update($request->all(),$slug);

        return redirect()->route('annonce.edit',$newSlug)->with('retour', 'Votre annonce a bien été modifiée !');
    }


    public function destroy($slug){

        //destruction de l'annonce
        $this->annonceGestion->destroy($slug);

        return redirect()->route('annonce.liste')->with('retour', 'Votre annonce a bien été supprimée !');
    }


    public function updateActive(Request $request, $slug){

        $this->annonceGestion->updateActive($request->all(), $slug);
 
        return response()->json();
    }

}