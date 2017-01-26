<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Repositories\FichierRepository;
use App\Repositories\TypeFichierRepository;

use Illuminate\Support\Facades\Log;

class FichierController extends Controller
{


	/**
     * The UserRepository instance.
     *
     * @var App\Repositories\UserRepository
     */
    protected $fichierGestion;
    protected $typeFichierGestion;


    /**
     * Create a new AdminController instance.
     *
     * @param  App\Repositories\UserRepository $user_gestion
     * @return void
     */
    public function __construct(FichierRepository $fichierGestion,TypeFichierRepository $typeFichierGestion){

		$this->fichierGestion = $fichierGestion;
        $this->typeFichierGestion = $typeFichierGestion;
    }

    public function index($typeFichier){

     	$listeFichiers = $this->fichierGestion->getListeFicchiers($typeFichier);
 
        return view('dashboard.catalogue_liste',['liste_fichiers'=> $listeFichiers]);
    }

     public function indexWeb($typeFichier){

        $listeFichiers = $this->fichierGestion->getListeFicchiers($typeFichier);
 
        return view('formation_liste',['liste_fichiers'=> $listeFichiers]);
    }

     public function create($typeFichier){

     	
        return view('dashboard.catalogue_creation',['typeFichier'=> $typeFichier]);
    }


    public function store(Request $request,$slugTypeFichier) {
  
        //validation des champs
  		$this->validate($request, [
            'nom' => 'required',
            'fichier' => "required|mimes:pdf|max:10000"
        ]);

        //si la validation a réussie: test si l'on a bien un fichier
        if($file = $request->hasFile('fichier')) {
            
            //récupération du fichier
            $file = $request->file('fichier') ;
            
            //renommage et déplacement du fichier
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/uploads/' ;
            $file->move($destinationPath,$fileName);

            //récupération du type de fichier
             $typeFichier = $this->typeFichierGestion->getTypeFichier($slugTypeFichier);

            //enregistrement des informations dans la base de données
            $this->fichierGestion->store($request,$typeFichier->id_type_fichier,$fileName,$request->user()->id);
            //$this->fichierGestion->store($request,$typeFichier->id);

            return redirect()->back()->with('retour','Votre fichier a bien été enregistré');
        }

        else
            return redirect()->back()->with('retour','Erreur sur la page');

        
	}

    public function edit($slug){

        //récupération du type de fichier
        //$typeFichier = $this->typeFichierGestion->getTypeFichier($slugTypeFichier);

        $result = $this->fichierGestion->edit($slug);


        return view('dashboard.catalogue_edit',$result);
    }

     public function update(Request $request,$slug){

        //enregistrement de l'annonce et récupération du nouveau slug
        $newSlug = $this->fichierGestion->update($request->all(),$slug);

        return redirect()->route('fichier.edit',$newSlug)->with('retour', 'Votre description de catalogue a bien été modifiée !');
    }


    public function destroy($slug){

        //destruction de l'annonce
        $this->fichierGestion->destroy($slug);

        return redirect()->route('fichier.liste','catalogue')->with('retour', 'Votre catalogue a bien été supprimé!');
    }
}
