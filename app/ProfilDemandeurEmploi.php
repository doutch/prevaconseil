<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilDemandeurEmploi extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'profils_demandeur_emploi';


	protected $fillable = array('nom','prenom','date_naissance','adresse','telephone','photo');

	protected $primaryKey = 'id_profil';


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
