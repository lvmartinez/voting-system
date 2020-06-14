<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class User
 * @package App\Models
 * @version April 7, 2020, 12:19 am UTC
 *
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property integer role_id
 * @property string remember_token
 */
class User extends Model
{

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'role_id',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'role_id' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role_id' => 'required'
    ];

    public function role(){
      return $this->belongsTo('App\Models\Role');
    }

}
