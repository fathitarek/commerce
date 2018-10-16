<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class products
 * @package App\Models
 * @version October 3, 2018, 5:09 am UTC
 *
 * @property string p_name
 * @property string category_id
 * @property int quantity
 * @property sting seller_id
 * @property int price
 * @property int discount
 */
class products extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'p_name',
        'category_id',
        'quantity',
        'seller_id',
        'price',
        'discount',
        'publish',
        'status_order_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'p_name' => 'string',
        'category_id' => 'string',
        'publish' => 'string',
        'status_order_id' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'p_name' => 'required',
        'category_id' => 'required',
        'quantity' => 'required',
        'seller_id' => 'required',
        'price' => 'required',
        'status_order_id'=> 'required',
    ];

    public function seller() {
        return $this->belongsTo('App\Models\sellers');
    }
public function category() {
        return $this->belongsTo('App\Models\categories');
    }
    public function status_order() {
        return $this->belongsTo('App\Models\status_order');
    }
    
}
