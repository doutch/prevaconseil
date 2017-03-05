<?php

namespace App\Repositories;

use App\ProfilDemandeurEmploi, App\User;

use DB;
use DateTime;

use App\Services\ConvertDates;

class ProfilRepository extends BaseRepository
{

	/**
	 * The Role instance.
	 *
	 * @var App\Role
	 */	
	protected $user;

	/**
	 * Create a new UserRepository instance.
	 *
	 * @param  App\Models\Post $post
   	 * @param  App\Models\User $user
	 * @return void
	 */
	public function __construct(ProfilDemandeurEmploi $profil,User $user,ConvertDates $convertDates)
	{
		$this->model = $profil;
		$this->user = $user;
		$this->convertDates = $convertDates;
	}


	public function ifProfilExist($idUser){

		$result = ProfilDemandeurEmploi::where('id_user','=',$idUser)->first();

		if ($result!= null) 
   			return false;
		
		else
			return true;
	}


	public function index($idUser){

		$profil = ProfilDemandeurEmploi::where('id_user','=',$idUser)->first();

		$profil->date_naissance = $this->convertDates->convertDate($profil->date_naissance,'Y-m-d','d/m/Y');

		return $profil;
	}


	public function store($typeProfil,$idUser,$inputs){

		//création d'un profil demandeur d'emploi
		if($typeProfil == 'demandeur_emploi')
			$profil = new ProfilDemandeurEmploi;

		//sauvegarde du profil
		$this->saveProfil($typeProfil,'store',$profil,$idUser,$inputs);

	}


	public function edit($typeProfil,$idProfil){

		if($typeProfil == 'demandeur_emploi'){
			$profil = ProfilDemandeurEmploi::where('id_profil','=',$idProfil)->first();

			$profil->date_naissance = $this->convertDates->convertDate($profil->date_naissance,'Y-m-d','d/m/Y');
		}

		return $profil;
	}

	public function update($typeProfil,$idProfil,$idUser,$inputs){

		//modification d'un profil demandeur d'emploi
		if($typeProfil == 'demandeur_emploi')
			$profil = ProfilDemandeurEmploi::where('id_profil','=',$idProfil)->first();

		//sauvegarde du profil
		$this->saveProfil($typeProfil,'update',$profil,$idUser,$inputs);
	}


	private function saveProfil($typeProfil,$typeSave,$profil,$idUser,$inputs){

		//Photo de base si n'existe pas
		if($inputs['photo'] == '' && $typeSave == 'store'){

			//profil demandeur d'emploi
			if($typeProfil == 'demandeur_emploi'){

				if($inputs['civilite'] == 'Mr')
					$inputs['photo'] = 'avatar_homme.png';

				else
					$inputs['photo'] = 'avatar_femme.png';
			}

			//Profil société
			else
				$inputs['photo'] = 'avatar_societe.png';
		}

		//Données du profil demandeur d'emploi
		if($typeProfil == 'demandeur_emploi'){

			//formatage de la date de naissance pour la base de données
			$dateNaissance = $this->convertDates->convertDate($inputs['date_naissance'],'d/m/Y','Y-m-d');

			//enregistrement des champs
			$profil->civilite = $inputs['civilite'];
			$profil->email = $inputs['email'];
			$profil->date_naissance = $dateNaissance;
			$profil->telephone = $inputs['telephone'];
			$profil->adresse = $inputs['adresse'];
			$profil->code_postal = $inputs['code_postal'];
			$profil->ville = $inputs['ville'];
			
			//Sauvegarde du nom de la photo si elle existe
			if($inputs['photo'] != '')
				$profil->photo = $inputs['photo'];
		}

		//enregistrement de la clé user
		$profil->id_user = $idUser;

		//sauvegarde
		$profil->save();

		//sauvegarde du prénom et du nom de l'user
		$user = $this->user->where('id','=',$idUser)->first();
		$user->firstname = $inputs['prenom'];
		$user->name = $inputs['nom'];

		//sauvegarde user
		$user->save();
	}
}
