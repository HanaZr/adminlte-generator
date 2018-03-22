<!-- Arrivee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('arrivee', 'Arrivee:') !!}
    {!! Form::date('arrivee', null, ['class' => 'form-control']) !!}
</div>

<!-- Depart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('depart', 'Depart:') !!}
    {!! Form::date('depart', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', 'Prix:') !!}
    {!! Form::number('prix', null, ['class' => 'form-control']) !!}
</div>

<!-- Catalogue Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('catalogue_id', 'Catalogue Id:') !!}
    {!! Form::number('catalogue_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Client Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('client_id', 'Client Id:') !!}
    {!! Form::number('client_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('reservations.index') !!}" class="btn btn-default">Cancel</a>
</div>
