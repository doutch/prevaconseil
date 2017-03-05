<?php 

namespace App\Services;

use DateTime;

class ConvertDates  {

	/**
	 * Set the login user statut
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function convertDate($date,$typeEntree,$typeSortie)
	{
		//formatage de la date de naissance pour la base de données
		$dateConvertie = DateTime::createFromFormat($typeEntree, $date);

		$dateConvertie = $dateConvertie->format($typeSortie);

		return $dateConvertie;
	}
}
