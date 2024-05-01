<?php

namespace App\Providers;

use App\Models\Rental;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        
            Blade::directive('checkRole', function (string $role) {
                return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
            });
    
            Blade::directive('endCheckRole', function () {
                return "<?php endif ; ?>";
            });
    
            FacadesGate::define('product', function (User $user) {
                return in_array($user->role, ['Admin', 'User']);
                
            });


            // Cashier::useCustomerModel(User::class);

        $rentals = Rental::latest()->paginate(3);
        
        view()->share(['rentals'=> $rentals ]);
        

        
    }
}
