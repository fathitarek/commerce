<?php

namespace App\Repositories;

use App\Models\stories;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class storiesRepository
 * @package App\Repositories
 * @version October 10, 2018, 3:50 pm UTC
 *
 * @method stories findWithoutFail($id, $columns = ['*'])
 * @method stories find($id, $columns = ['*'])
 * @method stories first($columns = ['*'])
*/
class storiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stories::class;
    }
}
