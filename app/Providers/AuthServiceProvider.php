<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*توسط کلاژر پایین فقط کاربری که مطلبی رو ساخته باشه میتونه ویرایش کنه
        Gate::define('can-update',function ($user,$articles){
            if ($user->id == $articles->user->id)
                return true;
            return false;
        });*/

        Gate::define('edit-user',function ($user,$users){
            $permissions=[];
            foreach ($user->roles as $role){
                foreach ($role->permissions as $permission){
                    $permissions[]=$permission->name;
                }
            }

            /*روش دوم
            foreach ($user->roles()->permissions as $permission){
                $permissions[]=$permission->name;
            }*/

            if (in_array('edit-user',$permissions))
                return true;
            return false;
        });
    }
}
