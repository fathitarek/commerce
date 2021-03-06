<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class sellers
 * @package App\Models
 * @version October 2, 2018, 6:05 am UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string telephone
 * @property string token
 * @property string super_name
 * @property string address
 * @property string description
 */
class sellers extends Model
{
    use SoftDeletes;

    public $table = 'sellers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'token',
        'super_name',
        'address',
        'description',
        'active',
        'logo',
        'city',
        'latitude',
        'languite'
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
        'token' => 'string',
        'super_name' => 'string',
        'address' => 'string',
        'description' => 'string',
        'active'=> 'string',
        'logo'=> 'text',
        'city'=> 'string',
        'latitude'=> 'string',
        'languite'=> 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
       /* 'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        //'token' => 'required',
        'super_name' => 'required'*/
         'active'=> 'required',
        'logo'=> 'required|mimes:jpeg,png',
        'city'=> 'required',
        'latitude'=> 'required',
        'languite'=> 'required'
    ];

 /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','token'
    ];
    
    public function products() {
        return $this->hasMany('App\Models\products');
    }
}
