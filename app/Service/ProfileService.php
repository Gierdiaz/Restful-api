<?php

namespace App\Service;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class ProfileService
{
    public function getAllProfile(): Collection
    {
        return Profile::all();
    }
}