<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'id',
        'name',
        'iso3',
        'iso2',
        'phone_code',
        'capital',
        'currency'
    ];
}
