@extends('layouts.app')

@section('content')
<section class="content-header">
    <h1>
        Reservations
    </h1>
</section>
<div class="content">
    @include('adminlte-templates::common.errors')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                {!! Form::model($reservations, ['route' => ['reservations.update', $reservations->id], 'method' =>
                'patch']) !!}

                @include('reservations.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection