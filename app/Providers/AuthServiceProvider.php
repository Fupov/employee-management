<?php

namespace App\Providers;

use App\Messages;
use App\Policies\MessagesPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
          Messages::class => MessagesPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Gate::define('edit-users',function ($user){
//            return $user->HasRole('Chef de division');
//        }
//        );
        Gate::define('create-users',function ($user){
            return $user->HasRole('Chef de division');
        }
        );
        Gate::define('show-messages',function (User $user,Messages $messages){
             return $user->id === $messages->from_id;
        }
        );

    }
}
