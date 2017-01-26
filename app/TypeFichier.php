<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFichier extends Model
{
    //


 /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'type_fichiers';


/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function fichier()
	{
	  return $this->hasMany('App\Fichier','id_fichier','id_fichier');
	}
}