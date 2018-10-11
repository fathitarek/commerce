<?php

namespace App\Repositories;

use App\Models\settings;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class settingsRepository
 * @package App\Repositories
 * @version October 11, 2018, 7:36 am UTC
 *
 * @method settings findWithoutFail($id, $columns = ['*'])
 * @method settings find($id, $columns = ['*'])
 * @method settings first($columns = ['*'])
*/
class settingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'location',
        'telephone',
        'logo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return settings::class;
    }
}
