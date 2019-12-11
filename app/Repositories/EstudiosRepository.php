<?php

namespace App\Repositories;

use App\Models\Estudios;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstudiosRepository
 * @package App\Repositories
 * @version November 3, 2019, 4:54 pm EST
 *
 * @method Estudios findWithoutFail($id, $columns = ['*'])
 * @method Estudios find($id, $columns = ['*'])
 * @method Estudios first($columns = ['*'])
*/
class EstudiosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_usuario',
        'tipo',
        'h_nombre',
        'h_apellido',
        'h_identifica',
        'h_iniciales',
        'h_dia',
        'h_mes',
        'h_anio',
        'h_pais',
        'pais_id',
        'a_especie',
        'a_duenio',
        'a_animal',
        'a_iniciales',
        'a_dia',
        'a_mes',
        'a_anio',
        'ip',
        'user_agent',
        'fecha'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estudios::class;
    }


}
