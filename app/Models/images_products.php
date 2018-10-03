<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class status_order
 * @package App\Models
 * @version October 1, 2018, 4:52 pm UTC
 *
 * @property string name
 */
class images_products extends Model
{
    use SoftDeletes;

    public $table = 'images_products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'product_id',"image_url"
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'string',
                'image_url' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_id' => 'required',
        'image_url' => 'required',
    ];

    
}
