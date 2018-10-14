<?php

namespace App\Repositories;

use App\Models\products;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class productsRepository
 * @package App\Repositories
 * @version October 3, 2018, 5:09 am UTC
 *
 * @method products findWithoutFail($id, $columns = ['*'])
 * @method products find($id, $columns = ['*'])
 * @method products first($columns = ['*'])
*/
class productsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'category_id',
        'quantity',
        'seller_id',
        'price',
        'discount',
        'publish'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return products::class;
    }
}
