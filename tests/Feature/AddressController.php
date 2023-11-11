<?php

use App\Http\Controllers\Api\AddressController;
use App\Service\AddressService;
use App\Http\Requests\AddressFormRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

it('can get all addresses', function () {
    $controller = new AddressController(new AddressService());

    // Simule uma solicitação HTTP
    $request = Request::create('/api/addresses', 'GET');
    $response = $controller->index($request);

    expect($response->getStatusCode())->toBe(200);
    // Adicione mais asserções conforme necessário
});

/* it('throws exception when getting non-existent address by ID', function () {
    $controller = new AddressController(new AddressService());

    // Simule uma solicitação HTTP
    $request = Request::create('/api/addresses/non_existent_id', 'GET');
    $this->expectException(\Exception::class);

    $controller->show('non_existent_id');
}); */

