<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Voting
 * @package App\Models
 * @version April 7, 2020, 12:20 am UTC
 *
 * @property integer user_id
 * @property integer nomination_id
 * @property integer category_id
 */
class Voting extends Model
{

    public $table = 'votings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'user_id',
        'nomination_id',
        'category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nomination_id' => 'integer',
        'category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       // 'user_id' => 'required',
        'nomination_id' => 'required',
        'category_id' => 'required'
    ];


}
