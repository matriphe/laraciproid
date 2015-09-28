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

    /**
     * Indicates if the model primary key.
     *
     * @var bool
     */
    protected $primaryKey = 'province_id';

    public function __construct()
    {
        $this->table = config('laraciproid.province');
    }

    public function cities()
    {
        return $this->hasMany(
            'App\Models\City',
            'province_id'
        );
    }
}
