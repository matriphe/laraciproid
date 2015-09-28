<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        $this->table = config('laraciproid.province');
    }

    public function cities()
    {
        return $this->hasMany(
            'App\Models\City',
            config('laraciproid.city'),
            'city_id',
            'province_id'
        );
    }
}
