<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Categore;
use App\Models\Certificate;
use App\Models\Contacte;
use App\Models\Educatione;
use App\Policies\CategorePolicy;
use App\Policies\CertificatePolicy;
use App\Policies\ContactePolicy;
use App\Policies\EducationePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Categore::class=>CategorePolicy::class,
        Certificate::class=>CertificatePolicy::class,
        Contacte::class=>ContactePolicy::class,
        Educatione::class=>EducationePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
