<?php

namespace App\Service;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class AddressService
{
    // index
    public function getAllAddress($profileId): Collection
    {
        return Address::where('profile_id', $profileId)->latest()->get();
    }

    // update and destroy
    public function getAddressById(string $id): Address
    {
        try {
            return Address::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new \Exception("Address not found", 404);
        };   
    }

    // store
    public function createAddress(array $data): Address
    {
        $validator = Validator::make($data, [
            'type' => 'required',
            'street' => 'required', 
            'number' => 'required', 
            'zip_code' => 'required',
            'city' => 'required',
            'province' => 'required', 
            'country' => 'required', 
            'remarks' => 'nullable',
            'main' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first(), 422);
        }
    
        return Address::create($data);
    }
    

    // show
    public function getAddress(string $id): Address
    {
        return $this->getAddressById($id);
    }

    // update
    public function updateAddress(Address $addresses, array $data): Address
    {
        try {
            $validator = Validator::make($data, [
                'type' => 'required',
                'street' => 'required', 
                'number' => 'required', 
                'zip_code' => 'required',
                'city' => 'required',
                'province' => 'required', 
                'country' => 'required', 
                'remarks' => 'nullable',
                'main' => 'nullable',
            ]);
    
            if ($validator->fails()) {
                throw new \Exception("Validation failed", 422);
            }
    
            $addresses->update($data);
    
            return $addresses;
        } catch (\Exception $e) {
            throw new \Exception("Failed to update address: " . $e->getMessage(), 500);
        }
    }    

    // destroy
    public function deleteAddress(Address $addresses): void
    {
        try {
            $addresses->delete();
        } catch (\Exception $e) {
            throw new \Exception("Failed to delete address: " . $e->getMessage(), 500);
        }
    }

}