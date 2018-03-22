<?php

namespace App\Repositories;

use App\Models\Catalogue;
use InfyOm\Generator\Common\BaseRepository;

class CatalogueRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero',
        'capacite',
        'type',
        'description',
        'prix'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Catalogue::class;
    }
}
