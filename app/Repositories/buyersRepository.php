<?php

namespace App\Repositories;

use App\Models\buyers;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class buyersRepository
 * @package App\Repositories
 * @version October 1, 2018, 6:02 pm UTC
 *
 * @method buyers findWithoutFail($id, $columns = ['*'])
 * @method buyers find($id, $columns = ['*'])
 * @method buyers first($columns = ['*'])
*/
class buyersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'telephone',
        'super_name',
        'token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return buyers::class;
    }
}
