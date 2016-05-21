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
