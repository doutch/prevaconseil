<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    
    /**
     * LA table utilisée par le modèle User
     *
     * @var string
     */
    protected $table = 'users';


    protected $fillable = array('name', 'email', 'password','id_role');

    protected $primaryKey = 'id';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * One to Many relation
     * Relation avec le modèle role
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role() 
    {
        return $this->belongsTo('App\Role','id_role','id_role');
    }


    

    /**
     * Check media all access
     *
     * @return bool
     */
    public function accessMediasAll()
    {
        return $this->role->slug == 'admin';
    }
     
    /**
     * Check media access one folder
     *
     * @return bool
     */
    public function accessMediasFolder()
    {
        return $this->role->slug != 'user';
    }
}
