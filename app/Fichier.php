<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fichiers';


	protected $fillable = array('nom', 'chemin');

	protected $primaryKey = 'id_fichiers';


	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function user() 
	{
	  return $this->belongsTo('App\User','id_user','id');
	}
}



