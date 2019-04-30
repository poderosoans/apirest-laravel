<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes(null, ['prefix' => 'api/oauth']);
        Passport::tokensExpireIn(Carbon::now()->addMinutes(30));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::enableImplicitGrant();

        // Scopes
        Passport::tokensCan([
            'puchase-product' => 'Crear transacciones para crear productos determinados',
            'manage-products' => 'Crear, ver, actualizar y eliminar productos',
            'manage-account' => 'Obtener la información de la cuenta, nombre, email, estado (sin contraseña), modificar datos del email, nombre y contraseña. No se puede eliminar la cuenta.',
            'read-general' => 'Obtener información general, categorías donde se compra y se vende, productos vendidos o comprados, transacciones, compras y ventas.'
        ]);
    }
}
