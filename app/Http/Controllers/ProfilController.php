<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Repositories\ProfilRepository;

use App\Services\UploadFile;

class ProfilController extends Controller
{

	protected $profilGestion;

 	public function __construct(ProfilRepository $profilGestion,UploadFile $uploadImage)
    {
		$this->profilGestion = $profilGestion;
        $this->uploadImage = $uploadImage;
	}

    public function index(Request $request){

    	//vue du profil car il existe
    	if(!$this->profilGestion->ifProfilExist($request->user()->id)){

    		//récupération du profil
    		$profil = $this->profilGestion->index($request->user()->id);

    		return view('dashboard.profil_demandeur_emploi_show',['prenom' => $request->user()->firstname,'nom' => $request->user()->name,
                                                                    'profil' => $profil]);
    	}

    	//sinon création du profil
    	else{

	    	if (session('statut') === 'employeur')
	    		$view = 'dashboard.profil_employeur_create';

	    	else if(session('statut') === 'demandeur_emploi')
	    		$view = 'dashboard.profil_demandeur_emploi_create';

	    	return view($view,['prenom' => $request->user()->firstname,'nom' => $request->user()->name,'email' => $request->user()->email]);
	    }

    	//update du statut
    }



    public function store(Request $request){

    /*	$v = Validator::make($request->all(), [
        'nom' => 'required|max:255',
        'prenom' => 'required|max:255'
    ]);*/

        //récupération des entrées
        $inputs = Input::all();
            
        $nomImage = $this->uploadPhoto( $request->file('photo'));

        if($nomImage == 'NOK')
            return redirect()->back()->with('retour', "Erreur lors de l'enregistrement de l'image!!");

        else
            $inputs['photo'] = $nomImage;
        

    	$this->profilGestion->store(session('statut'),$request->user()->id,$inputs);

    	return redirect()->back()->with('retour', "Votre profil a bien été enregistré !!");
    }


    public function edit(Request $request,$idProfil){

        //récupération du profil
            $profil = $this->profilGestion->edit(session('statut'),$idProfil);

            return view('dashboard.profil_demandeur_emploi_edit',['prenom' => $request->user()->firstname,'nom' => $request->user()->name,
                                                                    'profil' => $profil]);
    }

    public function update(Request $request,$idProfil){

        //récupération des entrées
        $inputs = Input::all();

        $nomImage = $this->uploadPhoto( $request->file('photo'));

        if($nomImage == 'NOK')
            return redirect()->back()->with('retour', "Erreur lors de l'enregistrement de l'image!!");

        else
            $inputs['photo'] = $nomImage;

        $this->profilGestion->update(session('statut'),$idProfil,$request->user()->id,$inputs);

        return redirect()->route('profil')->with('retour', "Votre profil a bien été modifié !!");
    }

    private function uploadPhoto($image){

        //téléchargement de l'image si existe
        if($image != '')
            $nomImage = $this->uploadImage->upload($image,'uploads/img');

        else
            $nomImage = '';

        return $nomImage;
    }

    /*public function test(){

    	return view('dashboard.test');
    }


     public function testSociete(){

    	return view('dashboard.test_societe');
    }*/
}
