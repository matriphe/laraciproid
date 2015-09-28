<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function __construct()
    {
        $this->table = config('laraciproid.city');
    }

    public function provinces()
    {
        return $this->belongsTo(
            'App\Models\Province',
            'province_id'
        );
    }
}
