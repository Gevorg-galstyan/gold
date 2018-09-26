<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'ip', 'countryName', 'countryCode', 'regionCode',
        'regionName', 'cityName', 'zipCode', 'isoCode',
        'postalCode', 'latitude', 'longitude', 'metroCode',
        'areaCode',
    ];
}
