<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class buyers
 * @package App\Models
 * @version October 1, 2018, 6:02 pm UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string telephone
 * @property string super_name
 * @property string token
 * @property string city
 */
class buyers extends Model
{
    use SoftDeletes;

    public $table = 'buyers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'super_name',
        'token',
        'city'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'telephone' => 'string',
        'super_name' => 'string',
        'token' => 'string',
        'city' => 'string'
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
        'super_name' => 'required',
        'city' => 'required'
    ];

   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','token'
    ]; 
}
