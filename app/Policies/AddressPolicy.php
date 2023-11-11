<?php

namespace App\Policies;

use App\Models\Address;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class AddressPolicy
{
    use HandlesAuthorization;

    public function viewAny(Address $addresses)
    {
        return Gate::allows('viewAny', Address::class);
    }

    public function view(Address $addresses)
    {
        return $this->permissions($addresses);
    }

    public function create(Address $addresses)
    {
        return Gate::allows('create', Address::class);
    }

    public function update(Address $addresses)
    {
        return $this->permissions($addresses);
    }

    public function delete(Address $addresses)
    {
        return $this->permissions($addresses);
    }

    // private function permissions(Address $addresses)
    // {
    //     return $address->profile_id == $user->profile->id || Gate::allows('update authorized addresses');
    // }
}
