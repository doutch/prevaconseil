<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actualites';


	protected $fillable = array('titre', 'slug');

	protected $primaryKey = 'id_actualite';


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
