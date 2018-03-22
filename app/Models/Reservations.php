<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Reservations
 * @package App\Models
 * @version March 22, 2018, 4:27 pm UTC
 */
class Reservations extends Model
{
    use SoftDeletes;

    public $table = 'reservations';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'arrivee',
        'depart',
        'prix',
        'catalogue_id',
        'client_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'arrivee' => 'date',
        'depart' => 'date',
        'prix' => 'integer',
        'catalogue_id' => 'integer',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function catalogue()
    {
        return $this->belongsTo(\App\Models\Catalogue::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }
}
