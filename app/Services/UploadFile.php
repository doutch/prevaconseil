<?php 

namespace App\Services;

use DateTime;

class UploadFile  {

	/**
	 * Set the login user statut
	 * 
	 * @param  Illuminate\Auth\Events\Login $login
	 * @return void
	 */
	public function upload($image,$chemin)
	{
		
		 // checking file is valid.
	    if ($image->isValid()) {

	      $extension = $image->getClientOriginalExtension(); // getting image extension

	      $nomFichier = rand(11111,99999).'.'.$extension; // renameing image
	      $image->move($chemin, $nomFichier); // uploading file to given path

	      // sending back with message
	      return $nomFichier;
	    }

	    else 
	      return 'NOK';
	}
}
