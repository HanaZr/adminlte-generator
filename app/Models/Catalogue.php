<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Catalogue
 * @package App\Models
 * @version March 22, 2018, 3:37 pm UTC
 */
class Catalogue extends Model
{
    use SoftDeletes;

    public $table = 'catalogue';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'numero',
        'capacite',
        'type',
        'description',
        'prix'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numero' => 'integer',
        'capacite' => 'integer',
        'type' => 'string',
        'description' => 'string',
        'prix' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
