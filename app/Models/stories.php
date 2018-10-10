<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stories
 * @package App\Models
 * @version October 10, 2018, 3:50 pm UTC
 *
 * @property string title
 * @property string description
 * @property string url
 */
class stories extends Model
{
    use SoftDeletes;

    public $table = 'stories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'url' => 'required'
    ];

    
}
