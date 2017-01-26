<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'annonces';


	protected $fillable = array('titre', 'slug');

	protected $primaryKey = 'id_annonce';



	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function user() 
	{
	  return $this->belongsTo('App\User','id_user','id');
	}


	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function typeAnnonce() 
	{
	  return $this->belongsTo('App\typeAnnonce','id_type_annonce','id_type_annonce');
	}


	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function categorie()
	{
	  return $this->hasMany('App\Categorie','id_categorie','id_categorie');
	}
}
