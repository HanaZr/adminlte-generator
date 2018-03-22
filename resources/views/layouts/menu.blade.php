<li class="{{ Request::is('catalogues*') ? 'active' : '' }}">
    <a href="{!! route('catalogues.index') !!}"><i class="fa fa-edit"></i><span>Catalogues</span></a>
</li>

<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{!! route('clients.index') !!}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('reservations*') ? 'active' : '' }}">
    <a href="{!! route('reservations.index') !!}"><i class="fa fa-edit"></i><span>Reservations</span></a>
</li>

