<?php

namespace App\Repositories;

use App\Models\Remedios;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RemediosRepository
 * @package App\Repositories
 * @version November 3, 2019, 4:52 pm EST
 *
 * @method Remedios findWithoutFail($id, $columns = ['*'])
 * @method Remedios find($id, $columns = ['*'])
 * @method Remedios first($columns = ['*'])
*/
class RemediosRepository extends BaseRepository
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
        'nombreCompleto',
        'descripcion',
        'imagen',
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
        return Remedios::class;
    }
}
