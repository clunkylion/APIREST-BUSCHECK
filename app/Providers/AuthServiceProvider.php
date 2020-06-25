<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
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
        // busCheck-token toquen de acceso personal, ver documentación 
        Passport::routes();
        Passport::personalAccessClientId(3);
        Passport :: tokensExpireIn (Carbon::now()->addDays(15));
        Passport :: refreshTokensExpireIn (Carbon::now()->addDays(30));
    }
}
