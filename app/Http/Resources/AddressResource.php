<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    public function with($request): array
    {
        return parent::with($request) + ['message' => $this->message ?? null];
    }

    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
}
