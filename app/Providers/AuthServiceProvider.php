<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

            $this->defineUserroleGate('isAdmin', UserRole::ADMIN);

        $this->defineUserroleGate('isUser', UserRole::USER);
    }

    /**
     * @return void
     */
    public function defineUserroleGate(string $name, string $role): void
    {
        Gate::define($name, function (User $user) use ($role){
            return $user->role == $role;
        });
    }
}
