<?php

namespace App\Repositories;

use App\Models\Cremedios;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CremediosRepository
 * @package App\Repositories
 * @version November 3, 2019, 4:48 pm EST
 *
 * @method Cremedios findWithoutFail($id, $columns = ['*'])
 * @method Cremedios find($id, $columns = ['*'])
 * @method Cremedios first($columns = ['*'])
*/
class CremediosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'idMatMed',
        'id_cremedios',
        'col_c',
        'col_d',
        'col_e',
        'pregnancia',
        'nombre',
        'tipoClasico',
        'tipoPolicresto',
        'tipoAvanzado',
        'tipoRemedioClave',
        'puros',
        'secuencia'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cremedios::class;
    }
}
