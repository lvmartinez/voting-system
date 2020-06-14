<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Nomination
 * @package App\Models
 * @version April 7, 2020, 12:07 am UTC
 *
 * @property string name
 * @property string gender
 * @property string linkedin_url
 * @property string bio
 * @property string business_name
 * @property string reason_for_nomination
 * @property string no_of_nominations
 * @property boolean is_admin_selected
 * @property boolean has_won
 * @property integer user_id
 * @property integer category_id
 */
class Nomination extends Model
{

    public $table = 'nominations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'name',
        'gender',
        'linkedin_url',
        'bio',
        'business_name',
        'reason_for_nomination',
        'no_of_nominations',
        'no_of_votes',
        'is_admin_selected',
        'has_won',
        'user_id',
        'image',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'gender' => 'string',
        'linkedin_url' => 'string',
        'bio' => 'string',
        'business_name' => 'string',
        'reason_for_nomination' => 'string',
        'no_of_nominations' => 'string',
        'no_of_votes' => 'string',
        'is_admin_selected' => 'boolean',
        'has_won' => 'boolean',
        'image' => 'string',
        'user_id' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'gender' => 'required',
        /*'is_admin_selected' => 'required',
        'has_won' => 'required',
        'user_id' => 'required',*/
        'category_id' => 'required'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

}
