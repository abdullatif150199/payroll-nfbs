<?php

namespace App\Http\Middleware;

use Closure;
use Lavary\Menu\Facade as Menu;

class DefineMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::make('primary', function ($menu) {
            $menu->add('Home', 'dashboard')->data('icon', 'fe fe-grid');
            $menu->add('Karyawan', 'dashboard/karyawan')->data('icon', 'fe fe-users');
            $menu->add('Daftar Gaji', 'dashboard/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Kehadiran', 'dashboard/kehadiran')->data('icon', 'fe fe-user-check');
            $menu->add('Cuti', 'dashboard/cuti')->data('icon', 'fe fe-user-x');
            $menu->add('Potongan', 'dashboard/potongan')->data('icon', 'fe fe-scissors');
            $menu->add('Setting', 'dashboard/setting')->data('icon', 'fe fe-settings');
        });

        Menu::make('profile', function ($menu) {
            $menu->add('Beranda', 'profile')->data('icon', 'fa fa-home');
        });

        return $next($request);
    }
}
