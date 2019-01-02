<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('getMethodCurrent',function (){
            $controller_action =  request()->route()->getActionName();
            $split_controller_action = explode('@',$controller_action);
            $action = $split_controller_action[1];
            $split_controller = explode('\\',$split_controller_action[0]);
            $controller = $split_controller[count($split_controller)-1];
            return array('action'=>$action,'controller'=>$controller);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
