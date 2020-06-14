<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class Setting
 * @package App\Models
 * @version April 7, 2020, 12:20 am UTC
 *
 * @property string|\Carbon\Carbon nomination_start_date
 * @property string|\Carbon\Carbon nomination_end_date
 * @property string|\Carbon\Carbon voting_start_date
 * @property string|\Carbon\Carbon voting_end_date
 */
class Setting extends Model
{

    public $table = 'settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'nomination_start_date',
        'nomination_end_date',
        'voting_start_date',
        'voting_end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nomination_start_date' => 'datetime',
        'nomination_end_date' => 'datetime',
        'voting_start_date' => 'datetime',
        'voting_end_date' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nomination_start_date' => 'required',
        'nomination_end_date' => 'required',
        'voting_start_date' => 'required',
        'voting_end_date' => 'required'
    ];

    
}
