<?php namespace App\Services;

use DB;
use DateTime;

class TestSlug  {

	/**
	 * Set the login user statut
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function test($model,$slug)
	{
		//test si la chaine fait plus de 256 caractères - le timestamp
		$sizeStr = count($slug);

		if($sizeStr > (256 - 15) ){

			$trunc = (256 - 15) - $sizeStr;
			$slug = substr($sizeStr - 1,0,$trunc);
		}

		//vérification si le slug existe
		$retour = $model->where('slug','=',$slug)->first();

		//si le slug existe déja
		if(!empty($retour)){

			//ajout du timestamp en plus
			$time = new DateTime();
			$slug = $slug.'_'.$time->getTimestamp();
		}

		return $slug;
	}
}
