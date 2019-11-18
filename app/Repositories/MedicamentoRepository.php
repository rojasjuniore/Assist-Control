<?php

namespace App\Repositories;

use App\Models\Medicamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MedicamentoRepository
 * @package App\Repositories
 * @version October 31, 2019, 8:42 am EDT
 *
 * @method Medicamento findWithoutFail($id, $columns = ['*'])
 * @method Medicamento find($id, $columns = ['*'])
 * @method Medicamento first($columns = ['*'])
*/
class MedicamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Medicamento::class;
    }
}
