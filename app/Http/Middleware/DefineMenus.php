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
            $menu->add('Home', 'dashboard')->data('icon', 'fe fe-grid')->active();
            $menu->add('Pegawai', 'dashboard/pegawai')->data('icon', 'fe fe-users');
            $menu->add('Daftar Gaji', 'dashboard/gaji')->data('icon', 'fe fe-shopping-bag');
            $menu->add('Kinerja', 'dashboard/kinerja')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Insentif', 'dashboard/insentif')->data('icon', 'fe fe-cloud-drizzle');
            $menu->add('Lembur', 'dashboard/lembur')->data('icon', 'fe fe-cloud-snow');
            $menu->add('Potongan', 'dashboard/potongan')->data('icon', 'fe fe-scissors');
            $menu->add('Lainnya', 'dashboard')->data('icon', 'fe fe-layers');
            $menu->lainnya->add('Kehadiran', 'dashboard/kehadiran');
            $menu->lainnya->add('Cuti', 'dashboard/cuti');
            $menu->lainnya->add('Pajak', 'dashboard/potongan/pajak');
        });

        Menu::make('profile', function ($menu) {
            $menu->add('Beranda', 'profile')->data('icon', 'fe fe-grid');
            $menu->add('Gaji', 'profile/gaji')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Lembur', 'profile/lembur')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Kehadiran', 'profile/kehadiran')->data('icon', 'fe fe-bar-chart-2');
            $menu->add('Cuti', 'profile/cuti')->data('icon', 'fe fe-bar-chart-2');
        });

        return $next($request);
    }
}
