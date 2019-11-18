<div class="table-responsive">
    <table id="data-table" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($medicamentos as $medicamento)
            <tr>
                <td>{!! $medicamento->nombre !!}</td>
                <td>{!! $medicamento->descripcion !!}</td>
                <td>{!! $medicamento->image !!}</td>
                <td>
                    {!! Form::open(['route' => ['medicamentos.destroy', $medicamento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('medicamentos.show', [$medicamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('medicamentos.edit', [$medicamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
