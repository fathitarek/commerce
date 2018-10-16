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
class status_order extends Model
{
    use SoftDeletes;

    public $table = 'status_orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

   public function products() {
        return $this->hasMany('App\Models\products');
    }  
}
