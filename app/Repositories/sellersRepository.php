<?php

namespace App\Repositories;

use App\Models\sellers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sellersRepository
 * @package App\Repositories
 * @version October 2, 2018, 6:05 am UTC
 *
 * @method sellers findWithoutFail($id, $columns = ['*'])
 * @method sellers find($id, $columns = ['*'])
 * @method sellers first($columns = ['*'])
*/
class sellersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'telephone',
        'token',
        'super_name',
        'address',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return sellers::class;
    }
}
