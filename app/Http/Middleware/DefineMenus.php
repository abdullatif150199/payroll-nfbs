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
            $menu->add('Home', 'dashboard')->data('icon', 'fe fe-home');
            $menu->add('Karyawan', 'dashboard/karyawan')->data('icon', 'fe fe-user-plus');
            $menu->add('Daftar Gaji', 'dashboard/gaji')->data('icon', 'fa fa-briefcase');
            $menu->add('Kehadiran', 'dashboard/kehadiran')->data('icon', 'fa fa-calendar-check-o');
            $menu->add('Cuti', 'dashboard/cuti')->data('icon', 'fa fa-calendar-times-o');
            $menu->add('Potongan', 'dashboard/potongan')->data('icon', 'fa fa-paypal');
            $menu->add('Golongan', 'dashboard/golongan')->data('icon', 'fa fa-users');
        });

        Menu::make('profile', function ($menu) {
            $menu->add('Beranda', 'profile')->data('icon', 'fa fa-home');
        });

        return $next($request);
    }
}
