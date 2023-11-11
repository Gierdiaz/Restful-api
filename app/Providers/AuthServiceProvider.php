<?php

namespace App\Providers;
use App\Policies\AddressPolicy;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Address::class => AddressPolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}
