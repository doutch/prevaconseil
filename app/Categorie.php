<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';


	protected $fillable = array('categorie');

	protected $primaryKey = 'id_categorie';

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function annonce() 
	{
	  return $this->hasMany('App\Annonce','id_annonce','id_annonce');
	}


	/**
	 * Belong to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function typeCategorie() 
	{
	  return $this->belongsToMany('App\TypeCategorie','categorie_type_categorie','id_categorie','id_type_categorie');
	}
}
