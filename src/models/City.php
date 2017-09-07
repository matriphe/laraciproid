<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = array(
        'city_id' => 'integer',
        'province_id' => 'integer',
        'city_lat' => 'float',
        'city_lon' => 'float',
    );

    /**
     * Indicates if the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = 'city_id';

    public function __construct()
    {
        $this->table = config('laraciproid.city');
    }

    public function province()
    {
        return $this->belongsTo(
            'App\Models\Province',
            'province_id'
        );
    }
}
