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
            $menu->add('Pegawai', 'dashboard/pegawai')->data('icon', 'fe fe-users');
            $menu->add('Kinerja', 'dashboard/kinerja')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Insentif', 'dashboard/insentif')->data('icon', 'fe fe-cloud-drizzle');
            $menu->add('Lembur', 'dashboard/lembur')->data('icon', 'fe fe-cloud-snow');
            $menu->add('Daftar Gaji', 'dashboard/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Potongan', 'dashboard/potongan')->data('icon', 'fe fe-scissors');
            $menu->add('Absensi', 'dashboard/kehadiran')->data('icon', 'fe fe-user-check');
            $menu->absensi->add('Kehadiran', 'dashboard/kehadiran');
            $menu->absensi->add('Cuti', 'dashboard/cuti');
        });

        Menu::make('profile', function ($menu) {
            $menu->add('Beranda', 'profile')->data('icon', 'fe fe-grid');
            $menu->add('Gaji', 'profile/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Lembur', 'profile/lembur')->data('icon', 'fe fe-cloud-snow');
            $menu->add('Kehadiran', 'profile/kehadiran')->data('icon', 'fe fe-user-check');
            $menu->add('Cuti', 'profile/cuti')->data('icon', 'fe fe-user-x');
        });

        return $next($request);
    }
}
