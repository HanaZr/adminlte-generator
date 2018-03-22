<table class="table table-responsive" id="reservations-table">
    <thead>
    <th>Arrivee</th>
    <th>Depart</th>
    <th>Prix</th>
    <th>Catalogue Id</th>
    <th>Client Id</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($reservations as $reservations)
    <tr>
        <td>{!! $reservations->arrivee !!}</td>
        <td>{!! $reservations->depart !!}</td>
        <td>{!! $reservations->prix !!}</td>
        <td>{!! $reservations->catalogue_id !!}</td>
        <td>{!! $reservations->client_id !!}</td>
        <td>
            {!! Form::open(['route' => ['reservations.destroy', $reservations->id], 'method' => 'delete']) !!}
            <div class='btn-group'>
                <a href="{!! route('reservations.show', [$reservations->id]) !!}" class='btn btn-default btn-xs'><i
                            class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('reservations.edit', [$reservations->id]) !!}" class='btn btn-default btn-xs'><i
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