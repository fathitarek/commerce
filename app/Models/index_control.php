<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class index_control
 * @package App\Models
 * @version October 22, 2018, 5:20 am UTC
 *
 * @property string paragraph
 * @property string image1
 * @property string title2
 * @property string paragraph
 * @property string image2
 */
class index_control extends Model
{
    use SoftDeletes;

    public $table = 'index_controls';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'paragraph',
        'image1',
        'title2',
        'paragraph',
        'image2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'paragraph' => 'string',
        'image1' => 'string',
        'title2' => 'string',
        'paragraph' => 'string',
        'image2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'paragraph' => 'required',
        'image1' => 'required',
        'title2' => 'required',
        'paragraph' => 'required',
        'image2' => 'required'
    ];

    
}
