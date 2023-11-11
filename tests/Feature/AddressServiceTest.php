<?php

use App\Service\AddressService;
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

/* it('can get all addresses', function () {
    // Crie alguns dados fictícios ou use métodos de criação de modelo para criar dados reais
    $profileId = 1;

    $service = new AddressService();
    $result = $service->getAllAddress($profileId);

    expect($result)->toBeInstanceOf(Collection::class);
}); */

/* it('throws exception when getting non-existent address by ID', function () {
    $this->expectException(\Exception::class);

    $service = new AddressService();
    $service->getAddressById('non_existent_id');
}); */

it('can get all addresses', function () {
    // Simule um perfil fictício
    $profileId = 1;

    // Crie um endereço fictício (substitua isso pelos métodos reais conforme necessário)
    $fakeAddress = new Address([
        'type' => 'Home',
        'street' => '123 Main St',
        'number' => '42',
        'zip_code' => '12345',
        'city' => 'Cityville',
        'province' => 'State',
        'country' => 'Country',
        'remarks' => 'Some remarks',
        'main' => true,
    ]);

    // Mock do Eloquent para retornar o endereço fictício
    $eloquentMock = Mockery::mock(Address::class);
    $eloquentMock->shouldReceive('where')->andReturnSelf();
    $eloquentMock->shouldReceive('latest')->andReturnSelf();
    $eloquentMock->shouldReceive('get')->andReturn(new Collection([$fakeAddress]));

    // Substitua Address::class pelo caminho real do seu modelo Address
    $addressService = new AddressService($eloquentMock);

    // Execute o método a ser testado
    $result = $addressService->getAllAddress($profileId);

    // Faça as asserções
    expect($result)->toBeInstanceOf(Collection::class);
    expect($result)->toHaveCount(1);
    expect($result->first())->toBeInstanceOf(Address::class);
    expect($result->first()->type)->toBe('Home');
});

