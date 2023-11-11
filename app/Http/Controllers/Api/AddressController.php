<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\AddressService;
use App\Http\Requests\AddressFormRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function index(Request $request, $profileId = null): JsonResponse
    {   
        Gate::authorize('viewAny', Address::class);

        try {
            $addresses = $this->addressService->getAllAddress($profileId);

            return AddressResource::collection($addresses)
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 403);
        }
    }

    public function show($id)
    {
        try {
            Gate::authorize('view', $addresses);
            $addresses = $this->addressService->getAddressById($id);

            return new AddressResource($addresses);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function store(AddressFormRequest $request)
    {
        Gate::authorize('create', Address::class);

        try {
            $data = $request->all();
            $addresses = $this->addressService->createAddress($data);

            return (new AddressResource($addresses))
                ->response()
                ->setStatusCode(201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function update(AddressFormRequest $request, $id)
    {
        try {
            $addresses = $this->addressService->getAddressById($id);
            Gate::authorize('update', $addresses);

            $data = $request->all();
            $this->addressService->updateAddress($addresses, $data);

            return (new AddressResource($addresses))
                ->response()
                ->setStatusCode(200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function destroy($id)
    {
        try {
            $addresses = $this->addressService->getAddressById($id);
            Gate::authorize('delete', $addresses);

            $this->addressService->deleteAddress($addresses);

            return response(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
