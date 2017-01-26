<?php

namespace App\Http\Controllers;

use App\Repositories\ActualiteRepository;

use Illuminate\Http\Request;


class ActualiteController extends Controller
{

	/**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $actualiteGestion;


	/**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(ActualiteRepository $actualiteGestion)
    {
		$this->actualiteGestion = $actualiteGestion;
    }


    public function index(Request $request){

        //liste des actualités 
        $listeActualites = $this->actualiteGestion->getListeActualites();

        return view('dashboard.actualite_liste',['liste_actualites'=> $listeActualites]);
    }


    public function create(){

        return view('dashboard.actualite_creation');
    }

    public function show($slug){

        $result = $this->actualiteGestion->show($slug);

        return view('dashboard.actualite_show',$result);
    }


    public function store(Request $request){

        //enregistrement de l'actualite
        $this->actualiteGestion->store($request->all(),$request->user()->id);

        return redirect()->back()->with('retour', 'Votre actualité a bien été enregistrée !');
    }


    public function edit($slug){

        $result = $this->actualiteGestion->show($slug);

        return view('dashboard.actualite_edit',$result);
    }


    public function update(Request $request,$slug){

        //enregistrement de l'actualite et récupération du nouveau slug
        $newSlug = $this->actualiteGestion->update($request->all(),$slug);

        return redirect()->route('actualite.edit',$newSlug)->with('retour', 'Votre actualité a bien été modifiée !');
    }


    public function destroy($slug){

        //destruction de l'actualite
        $this->actualiteGestion->destroy($slug);

        return redirect()->route('actualite.liste')->with('retour', 'Votre actualité a bien été supprimée !');
    }


    public function updateActive(Request $request, $slug){

        $this->actualiteGestion->updateActive($request->all(), $slug);
 
        return response()->json();
    }

}