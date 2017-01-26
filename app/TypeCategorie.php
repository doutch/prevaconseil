<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeCategorie extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'type_categories';


	protected $fillable = array('type_categorie');

	protected $primaryKey = 'id_type_categorie';


	/**
	 * Belong to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function categorie() 
	{
	  return $this->belongsToMany('App\Categorie','categorie_type_categorie','id_type_categorie','id_categorie');
	}
}
