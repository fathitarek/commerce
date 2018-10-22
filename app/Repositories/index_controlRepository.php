<?php

namespace App\Repositories;

use App\Models\index_control;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class index_controlRepository
 * @package App\Repositories
 * @version October 22, 2018, 5:20 am UTC
 *
 * @method index_control findWithoutFail($id, $columns = ['*'])
 * @method index_control find($id, $columns = ['*'])
 * @method index_control first($columns = ['*'])
*/
class index_controlRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'paragraph',
        'image1',
        'title2',
        'paragraph',
        'image2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return index_control::class;
    }
}
