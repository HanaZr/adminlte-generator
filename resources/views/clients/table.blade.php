<table class="table table-responsive" id="clients-table">
    <thead>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Pays</th>
    <th>Mobile</th>
    <th>Email</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($clients as $client)
    <tr>
        <td>{!! $client->nom !!}</td>
        <td>{!! $client->prenom !!}</td>
        <td>{!! $client->pays !!}</td>
        <td>{!! $client->mobile !!}</td>
        <td>{!! $client->email !!}</td>
        <td>
            {!! Form::open(['route' => ['clients.destroy', $client->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('clients.show', [$client->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('clients.edit', [$client->id]) !!}" class='btn btn-default btn-xs'><i
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