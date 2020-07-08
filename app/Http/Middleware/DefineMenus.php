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
            $menu->add('Insentif', 'dashboard/insentif')->data('icon', 'fe fe-cloud-drizzle');
            $menu->add('Kinerja', 'dashboard/kinerja')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Daftar Gaji', 'dashboard/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Potongan', 'dashboard/potongan')->data('icon', 'fe fe-scissors');
            $menu->add('Absensi', 'dashboard/kehadiran')->data('icon', 'fe fe-user-check');
            $menu->absensi->add('Kehadiran', 'dashboard/kehadiran');
            $menu->absensi->add('Cuti', 'dashboard/cuti');
            // $menu->add('Setting', 'dashboard/setting')->data('icon', 'fe fe-settings');
        });

        Menu::make('profile', function ($menu) {
            $menu->add('Beranda', 'profile')->data('icon', 'fe fe-grid');
            $menu->add('Gaji', 'profile/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Kehadiran', 'profile/kehadiran')->data('icon', 'fe fe-user-check');
            $menu->add('Cuti', 'profile/cuti')->data('icon', 'fe fe-user-x');
        });

        return $next($request);
    }
}
