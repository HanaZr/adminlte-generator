<?php

namespace App\Repositories;

use App\Models\Reservations;
use InfyOm\Generator\Common\BaseRepository;

class ReservationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'arrivee',
        'depart',
        'prix',
        'catalogue_id',
        'client_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Reservations::class;
    }
}
