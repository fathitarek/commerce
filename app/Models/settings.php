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
        'logo',
        'fb_link',
        'instgram_link',
        'twitter_link',
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
        'logo' => 'string',
        'fb_link'=> 'string',
        'instgram_link'=> 'string',
        'twitter_link'=> 'string',
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
        'logo' => 'required|mimes:jpeg,png',
         'fb_link'=> 'required',
        'instgram_link'=> 'required',
        'twitter_link'=> 'required',
    ];

    
}
