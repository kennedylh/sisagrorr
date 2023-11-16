<?php

namespace App\Providers;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Produtos;
use App\User;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         /* \App\Produtos::class => \App\Policies\ProdutoPolicy::class,*/
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
     /*
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('update-produto', function(User $user, Produtos $produto){
            return $user->id == $produto->user_id;
        });

        $permissions = Permission::with('roles')->get();

        foreach($permissions as $permission){

          $gate->define($permission->name, function(User $user) use ($permission){
              return $user->hasPermission($permission);
          });

        }

        $gate->before(function(User $user){
            if($user->hasAnyRoles('adm')){
                return true;
            }
        });
    }
*/
}
