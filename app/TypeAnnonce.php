<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeAnnonce extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'type_annonces';


	protected $fillable = array('type_annonce');

	protected $primaryKey = 'id_type_annonce';

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function annonce() 
	{
	  return $this->hasMany('App\Annonce','id_annonce','id_annonce');
	}
}
