<?php

namespace App\Repositories;

use App\Models\status_order;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class status_orderRepository
 * @package App\Repositories
 * @version October 1, 2018, 4:52 pm UTC
 *
 * @method status_order findWithoutFail($id, $columns = ['*'])
 * @method status_order find($id, $columns = ['*'])
 * @method status_order first($columns = ['*'])
*/
class status_orderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return status_order::class;
    }
}
