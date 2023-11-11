<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Profile extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'photo_path',
        'salutation',
        'titel',
        'firstname',
        'lastname',
        'email',
        'birth_date',
        'birth_name',
        'place_birth',
        'height',
        'weight',
        'blood_type',
        'user_id',
        'stripe_customer_id',
        'user_id_authorized'
    ];

    public function user(): BelongsTo 
    {
        return $this->BelongsTo(User::class);
    }

    public function addresses(): hasMany
    {
        $this->hasMany(Address::class);
    }

}
