<?php

namespace App\Repositories;

use App\Models\estudio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class estudioRepository
 * @package App\Repositories
 * @version November 3, 2019, 9:03 am EST
 *
 * @method estudio findWithoutFail($id, $columns = ['*'])
 * @method estudio find($id, $columns = ['*'])
 * @method estudio first($columns = ['*'])
*/
class estudioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estudio',
        'estatus',
        'prueba_uno'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return estudio::class;
    }
}
