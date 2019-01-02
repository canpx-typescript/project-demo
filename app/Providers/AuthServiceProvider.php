<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContact;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContact $gate)
    {
        $this->registerPolicies($gate);
        $gate->define('isAdmin',function ($user){
            return $user->level == '1';
        });
        $gate->define('isEditor',function ($user){
            return $user->level == '2';
        });
        $gate->define('isEditorOrAdmin',function ($user){
            if ($user->level == '2' || $user->level == '1'){
                return true;
            }
        });

        //
    }
}
