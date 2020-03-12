<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiKinerja extends Model
{
    protected $table = 'nilai_kinerja';

    protected $fillable = ['nilai', 'min_persen', 'max_persen', 'result_persen'];
}
