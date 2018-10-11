<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class settings
 * @package App\Models
 * @version October 11, 2018, 7:36 am UTC
 *
 * @property string email
 * @property string location
 * @property string telephone
 * @property string logo
 */
class settings extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'email',
        'location',
        'telephone',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'location' => 'string',
        'telephone' => 'string',
        'logo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required',
        'location' => 'required',
        'telephone' => 'required',
        'logo' => 'required'
    ];

    
}
