<?php

namespace App\Repositories;

use App\Models\Asistencia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AsistenciaRepository
 * @package App\Repositories
 * @version January 21, 2020, 5:28 pm EST
 *
 * @method Asistencia findWithoutFail($id, $columns = ['*'])
 * @method Asistencia find($id, $columns = ['*'])
 * @method Asistencia first($columns = ['*'])
*/
class AsistenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Asistencia::class;
    }
}
