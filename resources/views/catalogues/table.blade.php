<table class="table table-responsive" id="catalogues-table">
    <thead>
    <th>Numero</th>
    <th>Capacite</th>
    <th>Type</th>
    <th>Description</th>
    <th>Prix</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($catalogues as $catalogue)
    <tr>
        <td>{!! $catalogue->numero !!}</td>
        <td>{!! $catalogue->capacite !!}</td>
        <td>{!! $catalogue->type !!}</td>
        <td>{!! $catalogue->description !!}</td>
        <td>{!! $catalogue->prix !!}</td>
        <td>
            {!! Form::open(['route' => ['catalogues.destroy', $catalogue->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('catalogues.show', [$catalogue->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('catalogues.edit', [$catalogue->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn
                btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
            </div>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>