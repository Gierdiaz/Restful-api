<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Address extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'type',
        'street',
        'number',
        'zip_code',
        'city',
        'province',
        'country',
        'remarks',
        'main',
        'profile_id',
    ];

    protected $casts = [
        'main' => 'boolean',
    ];
}
