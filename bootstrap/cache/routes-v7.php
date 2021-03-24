<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eIvP87LHkmmWhVxi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s4MQO5ND4iTFuRAP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mark-as-read' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mark-as-read',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/coming-soon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'coming-soon',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7FLzxL9LBVFPfUYY',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3J9IXXRAtZ1kzhiR',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/gaji' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.gaji.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/lembur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/kehadiran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.kehadiran.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/cuti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/cuti/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/cuti/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile/komplain' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.komplain.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pegawai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-pegawai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pegawai/get-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.name',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/pegawai/sms' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.sms',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/gaji' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::zmQZLoqYOUSpmz8f',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-gaji' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.gaji.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/gaji/proses-ulang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.gaji.prosesUlang',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/gaji/unduh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.gaji.unduh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/insentif' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::raDLCOcqcbTKuhVy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.insentif.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-insentif' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.insentif.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/lembur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::GEslsdgkCr2YxIJb',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.lembur.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-lembur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.lembur.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::lFXqztfTQkxsWx3t',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/kehadiran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-kehadiran' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-pilihan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.pilihan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-apel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.apel',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-jadwal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.jadwal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/kehadiran/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/cuti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::Mz6V4LwSvmokHWGq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-cuti' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.cuti.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/potongan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.generated::aVaH3vzZPBsrYM3Q',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/get-potongan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/potongan/get-name' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.name',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/potongan/update-pivot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.updatePivote',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/keluarga' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.keluarga.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.setting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.setting.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/user/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/role/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/tax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/tax/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-tax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/jabatan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-jabatan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/golongan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-golongan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/kelompok-kerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kelompokKerja',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kelompokKerja.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-kelompok-kerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kelompokKerja.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/device' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-device' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/fingerprint' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.fingerprint.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-fingerprint' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.fingerprint.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/bulk-import' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bulkImport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bulkImport.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/bidang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-bidang' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/status-keluarga' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-status-keluarga' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/status-kerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-status-kerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/persentase-kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-persentase-kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/nilai-kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-nilai-kinerja' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/jam-perpekan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-jam-perpekan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/jam-ajar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-jam-ajar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/tarif-lembur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-tarif-lembur' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/rekening' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dashboard/setting/get-rekening' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening.datatable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/p(?|assword/reset/([^/]++)(*:34)|rofile/(?|([^/]++)/detail(*:66)|g(?|et\\-(?|gaji/([^/]++)(*:97)|lembur/([^/]++)(*:119)|kehadiran/([^/]++)(*:145)|cuti/([^/]++)(*:166))|aji/([^/]++)/(?|detail(*:197)|print(*:210)))|lembur/([^/]++)(?|(*:238))|cuti/([^/]++)(?|/edit(*:268)|(*:276))))|/dashboard/(?|p(?|egawai/([^/]++)(?|(*:323)|/(?|e(?|dit(*:342)|stimasi(*:357))|resign(*:372))|(*:381))|otongan(?|/(?|([^/]++)(?|/(?|edit(*:423)|attach(*:437)|([^/]++)/delete(*:460))|(*:469))|pajak(*:483)|get\\-pajak(*:501))|\\-pegawai/([^/]++)(*:528)))|gaji/([^/]++)/(?|detail(*:561)|print(*:574))|insentif/([^/]++)(?|/edit(*:608)|(*:616))|lembur/([^/]++)(?|/edit(*:648)|(*:656))|k(?|inerja(?|\\-pegawai/([^/]++)(*:696)|/([^/]++)(?|/(?|attach(*:726)|edit(*:738))|(*:747)))|e(?|hadiran/([^/]++)(?|/edit(*:785)|(*:793))|luarga/([^/]++)(?|/edit(*:825)|(*:833))))|setting/(?|u(?|ser/([^/]++)(?|(*:874)|/edit(*:887)|(*:895))|nit/([^/]++)(?|/edit(*:924)|(*:932)))|r(?|ole/([^/]++)(?|(*:961)|/edit(*:974)|(*:982))|ekening/([^/]++)(?|/edit(*:1015)|(*:1024)))|ta(?|x/([^/]++)(?|(*:1053)|/edit(*:1067)|(*:1076))|rif\\-lembur/([^/]++)(?|/edit(*:1114)|(*:1123)))|ja(?|batan/([^/]++)(?|/edit(*:1161)|(*:1170))|m\\-(?|perpekan/([^/]++)(?|/edit(*:1211)|(*:1220))|ajar/([^/]++)(?|/edit(*:1251)|(*:1260))))|golongan/([^/]++)(?|/edit(*:1297)|(*:1306))|kelompok\\-kerja/([^/]++)(?|/edit(*:1348)|(*:1357))|device/([^/]++)(?|/(?|edit(*:1393)|check(*:1407))|(*:1417))|bidang/([^/]++)(?|/edit(*:1450)|(*:1459))|status\\-ke(?|luarga/([^/]++)(?|/edit(*:1505)|(*:1514))|rja/([^/]++)(?|/edit(*:1544)|(*:1553)))|persentase\\-kinerja/([^/]++)(?|/edit(*:1600)|(*:1609))|nilai\\-kinerja/([^/]++)(?|/edit(*:1650)|(*:1659)))))/?$}sDu',
    ),
    3 => 
    array (
      34 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      66 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.detail',
          ),
          1 => 
          array (
            0 => 'username',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
            'POST' => 2,
            'PUT' => 3,
            'PATCH' => 4,
            'DELETE' => 5,
            'OPTIONS' => 6,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      97 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.gaji.datatable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      119 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.datatable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.kehadiran.datatable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      166 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.datatable',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.gaji.detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      210 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.gaji.slip',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      238 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'profile.lembur.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.cuti.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.estimasi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      372 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.resign',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.karyawan.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      423 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      437 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.attach',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      460 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.detach',
          ),
          1 => 
          array (
            0 => 'potongan_id',
            1 => 'karyawan_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      483 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.pajak',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      501 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.pajak.datatable',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      528 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.potongan.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      561 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.gaji.detail',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      574 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.gaji.slip',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.insentif.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      616 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.insentif.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.insentif.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      648 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.lembur.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      656 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.lembur.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.lembur.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.show',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      726 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.attach',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      738 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      747 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kinerja.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      785 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kehadiran.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      825 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.keluarga.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      833 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.keluarga.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.keluarga.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      874 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      887 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      895 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.user.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      924 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      932 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.unit.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      961 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      982 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.role.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1015 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1024 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.rekening.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1053 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.show',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1067 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.edit',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1076 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.update',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tax.destroy',
          ),
          1 => 
          array (
            0 => 'tax',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1114 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.tariflembur.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan.edit',
          ),
          1 => 
          array (
            0 => 'jabatan',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1170 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan.update',
          ),
          1 => 
          array (
            0 => 'jabatan',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jabatan.destroy',
          ),
          1 => 
          array (
            0 => 'jabatan',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1211 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan.edit',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan.update',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamPerpekan.destroy',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1251 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar.edit',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1260 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar.update',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.jamAjar.destroy',
          ),
          1 => 
          array (
            0 => 'jam',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1306 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.golongan.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kelompokKerja.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1357 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.kelompokKerja.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1407 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.check',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1417 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.device.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1450 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1459 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.bidang.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1505 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1514 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKeluarga.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1544 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1553 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.statusKerja.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1609 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.persentaseKinerja.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1659 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'dash.nilaiKinerja.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::eIvP87LHkmmWhVxi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\UserController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::eIvP87LHkmmWhVxi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::s4MQO5ND4iTFuRAP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@toLogin',
        'controller' => 'App\\Http\\Controllers\\HomeController@toLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::s4MQO5ND4iTFuRAP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'mark-as-read' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'mark-as-read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@markAsRead',
        'controller' => 'App\\Http\\Controllers\\HomeController@markAsRead',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'mark-as-read',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'coming-soon' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'coming-soon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@coming',
        'controller' => 'App\\Http\\Controllers\\HomeController@coming',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'coming-soon',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::7FLzxL9LBVFPfUYY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::7FLzxL9LBVFPfUYY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'generated::3J9IXXRAtZ1kzhiR' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'generated::3J9IXXRAtZ1kzhiR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@index',
        'as' => 'profile.',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
        2 => 'POST',
        3 => 'PUT',
        4 => 'PATCH',
        5 => 'DELETE',
        6 => 'OPTIONS',
      ),
      'uri' => 'profile/{username}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@edit',
        'as' => 'profile.detail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.gaji.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/gaji',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\GajiController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\GajiController@index',
        'as' => 'profile.gaji.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.gaji.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/get-gaji/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\GajiController@datatable',
        'controller' => 'App\\Http\\Controllers\\Profile\\GajiController@datatable',
        'as' => 'profile.gaji.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.gaji.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/gaji/{id}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\GajiController@detail',
        'controller' => 'App\\Http\\Controllers\\Profile\\GajiController@detail',
        'as' => 'profile.gaji.detail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.gaji.slip' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/gaji/{id}/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\GajiController@slip',
        'controller' => 'App\\Http\\Controllers\\Profile\\GajiController@slip',
        'as' => 'profile.gaji.slip',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@index',
        'as' => 'profile.lembur.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile/lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@store',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@store',
        'as' => 'profile.lembur.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@edit',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@edit',
        'as' => 'profile.lembur.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'profile/lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@update',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@update',
        'as' => 'profile.lembur.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'profile/lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@destroy',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@destroy',
        'as' => 'profile.lembur.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.lembur.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/get-lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\LemburController@datatable',
        'controller' => 'App\\Http\\Controllers\\Profile\\LemburController@datatable',
        'as' => 'profile.lembur.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.kehadiran.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/kehadiran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\KehadiranController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\KehadiranController@index',
        'as' => 'profile.kehadiran.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.kehadiran.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/get-kehadiran/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\KehadiranController@datatable',
        'controller' => 'App\\Http\\Controllers\\Profile\\KehadiranController@datatable',
        'as' => 'profile.kehadiran.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/cuti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@index',
        'as' => 'profile.cuti.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/cuti/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@create',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@create',
        'as' => 'profile.cuti.create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile/cuti/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@store',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@store',
        'as' => 'profile.cuti.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/cuti/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@edit',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@edit',
        'as' => 'profile.cuti.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'profile/cuti/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@update',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@update',
        'as' => 'profile.cuti.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.cuti.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/get-cuti/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\CutiController@datatable',
        'controller' => 'App\\Http\\Controllers\\Profile\\CutiController@datatable',
        'as' => 'profile.cuti.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'profile.komplain.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile/komplain',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|user',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\KomplainController@index',
        'controller' => 'App\\Http\\Controllers\\Profile\\KomplainController@index',
        'as' => 'profile.komplain.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/profile',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'as' => 'dash.home',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pegawai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@index',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@index',
        'as' => 'dash.',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-pegawai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@datatable',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@datatable',
        'as' => 'dash.karyawan.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pegawai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@store',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@store',
        'as' => 'dash.karyawan.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.name' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pegawai/get-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@name',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@name',
        'as' => 'dash.karyawan.name',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.sms' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pegawai/sms',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@sms',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@sms',
        'as' => 'dash.karyawan.sms',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pegawai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@show',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@show',
        'as' => 'dash.karyawan.show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/pegawai/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@edit',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@edit',
        'as' => 'dash.karyawan.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/pegawai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@update',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@update',
        'as' => 'dash.karyawan.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.resign' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/pegawai/{id}/resign',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@resign',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@resign',
        'as' => 'dash.karyawan.resign',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.karyawan.estimasi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/pegawai/{id}/estimasi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KaryawanController@estimasi',
        'controller' => 'App\\Http\\Controllers\\KaryawanController@estimasi',
        'as' => 'dash.karyawan.estimasi',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::zmQZLoqYOUSpmz8f' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/gaji',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@index',
        'controller' => 'App\\Http\\Controllers\\GajiController@index',
        'as' => 'dash.generated::zmQZLoqYOUSpmz8f',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.gaji.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-gaji',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@datatable',
        'controller' => 'App\\Http\\Controllers\\GajiController@datatable',
        'as' => 'dash.gaji.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.gaji.prosesUlang' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/gaji/proses-ulang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@prosesUlang',
        'controller' => 'App\\Http\\Controllers\\GajiController@prosesUlang',
        'as' => 'dash.gaji.prosesUlang',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.gaji.unduh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/gaji/unduh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@unduh',
        'controller' => 'App\\Http\\Controllers\\GajiController@unduh',
        'as' => 'dash.gaji.unduh',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.gaji.detail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/gaji/{id}/detail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@detail',
        'controller' => 'App\\Http\\Controllers\\GajiController@detail',
        'as' => 'dash.gaji.detail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.gaji.slip' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/gaji/{id}/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GajiController@slip',
        'controller' => 'App\\Http\\Controllers\\GajiController@slip',
        'as' => 'dash.gaji.slip',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::raDLCOcqcbTKuhVy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/insentif',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@index',
        'controller' => 'App\\Http\\Controllers\\InsentifController@index',
        'as' => 'dash.generated::raDLCOcqcbTKuhVy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.insentif.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-insentif',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@datatable',
        'controller' => 'App\\Http\\Controllers\\InsentifController@datatable',
        'as' => 'dash.insentif.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.insentif.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/insentif',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@store',
        'controller' => 'App\\Http\\Controllers\\InsentifController@store',
        'as' => 'dash.insentif.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.insentif.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/insentif/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@edit',
        'controller' => 'App\\Http\\Controllers\\InsentifController@edit',
        'as' => 'dash.insentif.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.insentif.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/insentif/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@update',
        'controller' => 'App\\Http\\Controllers\\InsentifController@update',
        'as' => 'dash.insentif.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.insentif.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/insentif/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\InsentifController@destroy',
        'controller' => 'App\\Http\\Controllers\\InsentifController@destroy',
        'as' => 'dash.insentif.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::GEslsdgkCr2YxIJb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@index',
        'controller' => 'App\\Http\\Controllers\\LemburController@index',
        'as' => 'dash.generated::GEslsdgkCr2YxIJb',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.lembur.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@datatable',
        'controller' => 'App\\Http\\Controllers\\LemburController@datatable',
        'as' => 'dash.lembur.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.lembur.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@store',
        'controller' => 'App\\Http\\Controllers\\LemburController@store',
        'as' => 'dash.lembur.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.lembur.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/lembur/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@edit',
        'controller' => 'App\\Http\\Controllers\\LemburController@edit',
        'as' => 'dash.lembur.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.lembur.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@update',
        'controller' => 'App\\Http\\Controllers\\LemburController@update',
        'as' => 'dash.lembur.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.lembur.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\LemburController@destroy',
        'controller' => 'App\\Http\\Controllers\\LemburController@destroy',
        'as' => 'dash.lembur.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::lFXqztfTQkxsWx3t' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@index',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@index',
        'as' => 'dash.generated::lFXqztfTQkxsWx3t',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@datatable',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@datatable',
        'as' => 'dash.kinerja.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@store',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@store',
        'as' => 'dash.kinerja.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/kinerja-pegawai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@show',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@show',
        'as' => 'dash.kinerja.show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.attach' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/kinerja/{id}/attach',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@attach',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@attach',
        'as' => 'dash.kinerja.attach',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/kinerja/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@edit',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@edit',
        'as' => 'dash.kinerja.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@update',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@update',
        'as' => 'dash.kinerja.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kinerja.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KinerjaController@destroy',
        'controller' => 'App\\Http\\Controllers\\KinerjaController@destroy',
        'as' => 'dash.kinerja.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/kehadiran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@index',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@index',
        'as' => 'dash.kehadiran',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-kehadiran',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@datatable',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@datatable',
        'as' => 'dash.kehadiran.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.pilihan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-pilihan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@pilihan',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@pilihan',
        'as' => 'dash.kehadiran.pilihan',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.apel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-apel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@apel',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@apel',
        'as' => 'dash.kehadiran.apel',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.jadwal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-jadwal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@jadwal',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@jadwal',
        'as' => 'dash.kehadiran.jadwal',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/kehadiran/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@store',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@store',
        'as' => 'dash.kehadiran.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/kehadiran/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@edit',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@edit',
        'as' => 'dash.kehadiran.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/kehadiran/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@update',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@update',
        'as' => 'dash.kehadiran.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kehadiran.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/kehadiran/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KehadiranController@destroy',
        'controller' => 'App\\Http\\Controllers\\KehadiranController@destroy',
        'as' => 'dash.kehadiran.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::Mz6V4LwSvmokHWGq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/cuti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\CutiController@index',
        'controller' => 'App\\Http\\Controllers\\CutiController@index',
        'as' => 'dash.generated::Mz6V4LwSvmokHWGq',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.cuti.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-cuti',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\CutiController@datatable',
        'controller' => 'App\\Http\\Controllers\\CutiController@datatable',
        'as' => 'dash.cuti.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.generated::aVaH3vzZPBsrYM3Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@index',
        'controller' => 'App\\Http\\Controllers\\PotonganController@index',
        'as' => 'dash.generated::aVaH3vzZPBsrYM3Q',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/get-potongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@datatable',
        'controller' => 'App\\Http\\Controllers\\PotonganController@datatable',
        'as' => 'dash.potongan.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/potongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@store',
        'controller' => 'App\\Http\\Controllers\\PotonganController@store',
        'as' => 'dash.potongan.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.name' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan/get-name',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@name',
        'controller' => 'App\\Http\\Controllers\\PotonganController@name',
        'as' => 'dash.potongan.name',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@edit',
        'controller' => 'App\\Http\\Controllers\\PotonganController@edit',
        'as' => 'dash.potongan.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.attach' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/potongan/{id}/attach',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@attach',
        'controller' => 'App\\Http\\Controllers\\PotonganController@attach',
        'as' => 'dash.potongan.attach',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan-pegawai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@show',
        'controller' => 'App\\Http\\Controllers\\PotonganController@show',
        'as' => 'dash.potongan.show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.updatePivote' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/potongan/update-pivot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@updatePivot',
        'controller' => 'App\\Http\\Controllers\\PotonganController@updatePivot',
        'as' => 'dash.potongan.updatePivote',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/potongan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@update',
        'controller' => 'App\\Http\\Controllers\\PotonganController@update',
        'as' => 'dash.potongan.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/potongan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@destroy',
        'controller' => 'App\\Http\\Controllers\\PotonganController@destroy',
        'as' => 'dash.potongan.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.potongan.detach' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/potongan/{potongan_id}/{karyawan_id}/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PotonganController@detach',
        'controller' => 'App\\Http\\Controllers\\PotonganController@detach',
        'as' => 'dash.potongan.detach',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.pajak' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan/pajak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PajakController@index',
        'controller' => 'App\\Http\\Controllers\\PajakController@index',
        'as' => 'dash.pajak',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/potongan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.pajak.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/potongan/get-pajak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PajakController@datatable',
        'controller' => 'App\\Http\\Controllers\\PajakController@datatable',
        'as' => 'dash.pajak.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/potongan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.keluarga.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/keluarga',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KeluargaController@store',
        'controller' => 'App\\Http\\Controllers\\KeluargaController@store',
        'as' => 'dash.keluarga.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.keluarga.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/keluarga/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KeluargaController@edit',
        'controller' => 'App\\Http\\Controllers\\KeluargaController@edit',
        'as' => 'dash.keluarga.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.keluarga.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/keluarga/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KeluargaController@update',
        'controller' => 'App\\Http\\Controllers\\KeluargaController@update',
        'as' => 'dash.keluarga.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.keluarga.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/keluarga/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KeluargaController@destroy',
        'controller' => 'App\\Http\\Controllers\\KeluargaController@destroy',
        'as' => 'dash.keluarga.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/dashboard',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.setting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@index',
        'controller' => 'App\\Http\\Controllers\\SettingController@index',
        'as' => 'dash.setting',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.setting.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingController@update',
        'controller' => 'App\\Http\\Controllers\\SettingController@update',
        'as' => 'dash.setting.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.index',
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/user/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.create',
        'uses' => 'App\\Http\\Controllers\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\UserController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.store',
        'uses' => 'App\\Http\\Controllers\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\UserController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/user/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.show',
        'uses' => 'App\\Http\\Controllers\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\UserController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/user/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.edit',
        'uses' => 'App\\Http\\Controllers\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\UserController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'dashboard/setting/user/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.update',
        'uses' => 'App\\Http\\Controllers\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\UserController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/user/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.user.destroy',
        'uses' => 'App\\Http\\Controllers\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\UserController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.index',
        'uses' => 'App\\Http\\Controllers\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\RoleController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/role/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.create',
        'uses' => 'App\\Http\\Controllers\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\RoleController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.store',
        'uses' => 'App\\Http\\Controllers\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\RoleController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.show',
        'uses' => 'App\\Http\\Controllers\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\RoleController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/role/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.edit',
        'uses' => 'App\\Http\\Controllers\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\RoleController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'dashboard/setting/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.update',
        'uses' => 'App\\Http\\Controllers\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\RoleController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/role/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.role.destroy',
        'uses' => 'App\\Http\\Controllers\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\RoleController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.index',
        'uses' => 'App\\Http\\Controllers\\TaxController@index',
        'controller' => 'App\\Http\\Controllers\\TaxController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tax/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.create',
        'uses' => 'App\\Http\\Controllers\\TaxController@create',
        'controller' => 'App\\Http\\Controllers\\TaxController@create',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/tax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.store',
        'uses' => 'App\\Http\\Controllers\\TaxController@store',
        'controller' => 'App\\Http\\Controllers\\TaxController@store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tax/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.show',
        'uses' => 'App\\Http\\Controllers\\TaxController@show',
        'controller' => 'App\\Http\\Controllers\\TaxController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tax/{tax}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.edit',
        'uses' => 'App\\Http\\Controllers\\TaxController@edit',
        'controller' => 'App\\Http\\Controllers\\TaxController@edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'dashboard/setting/tax/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.update',
        'uses' => 'App\\Http\\Controllers\\TaxController@update',
        'controller' => 'App\\Http\\Controllers\\TaxController@update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/tax/{tax}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'as' => 'dash.tax.destroy',
        'uses' => 'App\\Http\\Controllers\\TaxController@destroy',
        'controller' => 'App\\Http\\Controllers\\TaxController@destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.user.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@datatable',
        'controller' => 'App\\Http\\Controllers\\UserController@datatable',
        'as' => 'dash.user.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.role.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RoleController@datatable',
        'controller' => 'App\\Http\\Controllers\\RoleController@datatable',
        'as' => 'dash.role.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tax.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-tax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxController@datatable',
        'controller' => 'App\\Http\\Controllers\\TaxController@datatable',
        'as' => 'dash.tax.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jabatan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@index',
        'controller' => 'App\\Http\\Controllers\\JabatanController@index',
        'as' => 'dash.jabatan',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-jabatan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@datatable',
        'controller' => 'App\\Http\\Controllers\\JabatanController@datatable',
        'as' => 'dash.jabatan.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/jabatan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@store',
        'controller' => 'App\\Http\\Controllers\\JabatanController@store',
        'as' => 'dash.jabatan.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jabatan/{jabatan}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@edit',
        'controller' => 'App\\Http\\Controllers\\JabatanController@edit',
        'as' => 'dash.jabatan.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/jabatan/{jabatan}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@update',
        'controller' => 'App\\Http\\Controllers\\JabatanController@update',
        'as' => 'dash.jabatan.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jabatan.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/jabatan/{jabatan}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JabatanController@destroy',
        'controller' => 'App\\Http\\Controllers\\JabatanController@destroy',
        'as' => 'dash.jabatan.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/golongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@index',
        'controller' => 'App\\Http\\Controllers\\GolonganController@index',
        'as' => 'dash.golongan',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-golongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@datatable',
        'controller' => 'App\\Http\\Controllers\\GolonganController@datatable',
        'as' => 'dash.golongan.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/golongan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@store',
        'controller' => 'App\\Http\\Controllers\\GolonganController@store',
        'as' => 'dash.golongan.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/golongan/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@edit',
        'controller' => 'App\\Http\\Controllers\\GolonganController@edit',
        'as' => 'dash.golongan.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/golongan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@update',
        'controller' => 'App\\Http\\Controllers\\GolonganController@update',
        'as' => 'dash.golongan.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.golongan.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/golongan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\GolonganController@destroy',
        'controller' => 'App\\Http\\Controllers\\GolonganController@destroy',
        'as' => 'dash.golongan.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kelompokKerja' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/kelompok-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KelompokKerjaController@index',
        'controller' => 'App\\Http\\Controllers\\KelompokKerjaController@index',
        'as' => 'dash.kelompokKerja',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kelompokKerja.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-kelompok-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KelompokKerjaController@datatable',
        'controller' => 'App\\Http\\Controllers\\KelompokKerjaController@datatable',
        'as' => 'dash.kelompokKerja.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kelompokKerja.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/kelompok-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KelompokKerjaController@store',
        'controller' => 'App\\Http\\Controllers\\KelompokKerjaController@store',
        'as' => 'dash.kelompokKerja.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kelompokKerja.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/kelompok-kerja/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KelompokKerjaController@edit',
        'controller' => 'App\\Http\\Controllers\\KelompokKerjaController@edit',
        'as' => 'dash.kelompokKerja.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.kelompokKerja.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/kelompok-kerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\KelompokKerjaController@update',
        'controller' => 'App\\Http\\Controllers\\KelompokKerjaController@update',
        'as' => 'dash.kelompokKerja.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/device',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@index',
        'controller' => 'App\\Http\\Controllers\\DeviceController@index',
        'as' => 'dash.device',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-device',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@datatable',
        'controller' => 'App\\Http\\Controllers\\DeviceController@datatable',
        'as' => 'dash.device.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/device',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@store',
        'controller' => 'App\\Http\\Controllers\\DeviceController@store',
        'as' => 'dash.device.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/device/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@edit',
        'controller' => 'App\\Http\\Controllers\\DeviceController@edit',
        'as' => 'dash.device.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/device/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@update',
        'controller' => 'App\\Http\\Controllers\\DeviceController@update',
        'as' => 'dash.device.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/device/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@destroy',
        'controller' => 'App\\Http\\Controllers\\DeviceController@destroy',
        'as' => 'dash.device.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.device.check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/device/{id}/check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\DeviceController@check',
        'controller' => 'App\\Http\\Controllers\\DeviceController@check',
        'as' => 'dash.device.check',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.fingerprint.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/fingerprint',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\FingerprintController@index',
        'controller' => 'App\\Http\\Controllers\\FingerprintController@index',
        'as' => 'dash.fingerprint.index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.fingerprint.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-fingerprint',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\FingerprintController@datatable',
        'controller' => 'App\\Http\\Controllers\\FingerprintController@datatable',
        'as' => 'dash.fingerprint.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bulkImport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/bulk-import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BulkImportController@index',
        'controller' => 'App\\Http\\Controllers\\BulkImportController@index',
        'as' => 'dash.bulkImport',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bulkImport.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/bulk-import',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BulkImportController@store',
        'controller' => 'App\\Http\\Controllers\\BulkImportController@store',
        'as' => 'dash.bulkImport.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/bidang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@index',
        'controller' => 'App\\Http\\Controllers\\BidangController@index',
        'as' => 'dash.bidang',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-bidang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@datatable',
        'controller' => 'App\\Http\\Controllers\\BidangController@datatable',
        'as' => 'dash.bidang.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/bidang',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@store',
        'controller' => 'App\\Http\\Controllers\\BidangController@store',
        'as' => 'dash.bidang.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/bidang/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@edit',
        'controller' => 'App\\Http\\Controllers\\BidangController@edit',
        'as' => 'dash.bidang.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/bidang/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@update',
        'controller' => 'App\\Http\\Controllers\\BidangController@update',
        'as' => 'dash.bidang.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.bidang.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/bidang/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\BidangController@destroy',
        'controller' => 'App\\Http\\Controllers\\BidangController@destroy',
        'as' => 'dash.bidang.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@index',
        'controller' => 'App\\Http\\Controllers\\UnitController@index',
        'as' => 'dash.unit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@datatable',
        'controller' => 'App\\Http\\Controllers\\UnitController@datatable',
        'as' => 'dash.unit.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@store',
        'controller' => 'App\\Http\\Controllers\\UnitController@store',
        'as' => 'dash.unit.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/unit/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@edit',
        'controller' => 'App\\Http\\Controllers\\UnitController@edit',
        'as' => 'dash.unit.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/unit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@update',
        'controller' => 'App\\Http\\Controllers\\UnitController@update',
        'as' => 'dash.unit.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.unit.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/unit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\UnitController@destroy',
        'controller' => 'App\\Http\\Controllers\\UnitController@destroy',
        'as' => 'dash.unit.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/status-keluarga',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@index',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@index',
        'as' => 'dash.statusKeluarga',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-status-keluarga',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@datatable',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@datatable',
        'as' => 'dash.statusKeluarga.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/status-keluarga',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@store',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@store',
        'as' => 'dash.statusKeluarga.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/status-keluarga/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@edit',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@edit',
        'as' => 'dash.statusKeluarga.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/status-keluarga/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@update',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@update',
        'as' => 'dash.statusKeluarga.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKeluarga.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/status-keluarga/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKeluargaController@destroy',
        'controller' => 'App\\Http\\Controllers\\StatusKeluargaController@destroy',
        'as' => 'dash.statusKeluarga.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/status-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@index',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@index',
        'as' => 'dash.statusKerja',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-status-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@datatable',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@datatable',
        'as' => 'dash.statusKerja.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/status-kerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@store',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@store',
        'as' => 'dash.statusKerja.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/status-kerja/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@edit',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@edit',
        'as' => 'dash.statusKerja.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/status-kerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@update',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@update',
        'as' => 'dash.statusKerja.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.statusKerja.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/status-kerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\StatusKerjaController@destroy',
        'controller' => 'App\\Http\\Controllers\\StatusKerjaController@destroy',
        'as' => 'dash.statusKerja.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/persentase-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@index',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@index',
        'as' => 'dash.persentaseKinerja',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-persentase-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@datatable',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@datatable',
        'as' => 'dash.persentaseKinerja.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/persentase-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@store',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@store',
        'as' => 'dash.persentaseKinerja.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/persentase-kinerja/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@edit',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@edit',
        'as' => 'dash.persentaseKinerja.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/persentase-kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@update',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@update',
        'as' => 'dash.persentaseKinerja.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.persentaseKinerja.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/persentase-kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\PersentaseKinerjaController@destroy',
        'controller' => 'App\\Http\\Controllers\\PersentaseKinerjaController@destroy',
        'as' => 'dash.persentaseKinerja.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/nilai-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@index',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@index',
        'as' => 'dash.nilaiKinerja',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-nilai-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@datatable',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@datatable',
        'as' => 'dash.nilaiKinerja.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/nilai-kinerja',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@store',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@store',
        'as' => 'dash.nilaiKinerja.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/nilai-kinerja/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@edit',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@edit',
        'as' => 'dash.nilaiKinerja.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/nilai-kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@update',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@update',
        'as' => 'dash.nilaiKinerja.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.nilaiKinerja.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/nilai-kinerja/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\NilaiKinerjaController@destroy',
        'controller' => 'App\\Http\\Controllers\\NilaiKinerjaController@destroy',
        'as' => 'dash.nilaiKinerja.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jam-perpekan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@index',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@index',
        'as' => 'dash.jamPerpekan',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-jam-perpekan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@datatable',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@datatable',
        'as' => 'dash.jamPerpekan.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/jam-perpekan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@store',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@store',
        'as' => 'dash.jamPerpekan.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jam-perpekan/{jam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@edit',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@edit',
        'as' => 'dash.jamPerpekan.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/jam-perpekan/{jam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@update',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@update',
        'as' => 'dash.jamPerpekan.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamPerpekan.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/jam-perpekan/{jam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamPerpekanController@destroy',
        'controller' => 'App\\Http\\Controllers\\JamPerpekanController@destroy',
        'as' => 'dash.jamPerpekan.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jam-ajar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@index',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@index',
        'as' => 'dash.jamAjar',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-jam-ajar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@datatable',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@datatable',
        'as' => 'dash.jamAjar.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/jam-ajar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@store',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@store',
        'as' => 'dash.jamAjar.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/jam-ajar/{jam}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@edit',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@edit',
        'as' => 'dash.jamAjar.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/jam-ajar/{jam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@update',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@update',
        'as' => 'dash.jamAjar.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.jamAjar.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/jam-ajar/{jam}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\JamAjarController@destroy',
        'controller' => 'App\\Http\\Controllers\\JamAjarController@destroy',
        'as' => 'dash.jamAjar.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tarif-lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@index',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@index',
        'as' => 'dash.tariflembur',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-tarif-lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@datatable',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@datatable',
        'as' => 'dash.tariflembur.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/tarif-lembur',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@store',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@store',
        'as' => 'dash.tariflembur.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/tarif-lembur/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@edit',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@edit',
        'as' => 'dash.tariflembur.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/tarif-lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@update',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@update',
        'as' => 'dash.tariflembur.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.tariflembur.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/tarif-lembur/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\TarifLemburController@destroy',
        'controller' => 'App\\Http\\Controllers\\TarifLemburController@destroy',
        'as' => 'dash.tariflembur.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/rekening',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@index',
        'controller' => 'App\\Http\\Controllers\\RekeningController@index',
        'as' => 'dash.rekening',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening.datatable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/get-rekening',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@datatable',
        'controller' => 'App\\Http\\Controllers\\RekeningController@datatable',
        'as' => 'dash.rekening.datatable',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'dashboard/setting/rekening',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@store',
        'controller' => 'App\\Http\\Controllers\\RekeningController@store',
        'as' => 'dash.rekening.store',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dashboard/setting/rekening/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@edit',
        'controller' => 'App\\Http\\Controllers\\RekeningController@edit',
        'as' => 'dash.rekening.edit',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'dashboard/setting/rekening/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@update',
        'controller' => 'App\\Http\\Controllers\\RekeningController@update',
        'as' => 'dash.rekening.update',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dash.rekening.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'dashboard/setting/rekening/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:root|admin|kabid|kanit',
        ),
        'uses' => 'App\\Http\\Controllers\\RekeningController@destroy',
        'controller' => 'App\\Http\\Controllers\\RekeningController@destroy',
        'as' => 'dash.rekening.destroy',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'dashboard/setting',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
