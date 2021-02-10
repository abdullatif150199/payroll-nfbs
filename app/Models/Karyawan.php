<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'user_id', 'golongan_id', 'status_kerja_id', 'tarif_lembur_id', 'kelompok_kerja_id', 'no_induk', 'nik', 'nama_lengkap', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'status_pernikahan', 'alamat', 'no_hp', 'nama_pendidikan', 'pendidikan_terakhir', 'jurusan', 'tahun_lulus',
        'tanggal_masuk', 'nama_bank', 'no_rekening', 'rekening_atas_nama', 'status', 'tipe_kerja', 'jam_perpekan_id', 'contract_expired'
    ];

    public function jabatan()
    {
        return $this->belongsToMany(Jabatan::class, 'jabatan_karyawan');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function bidang()
    {
        return $this->belongsToMany(Bidang::class, 'bidang_karyawan');
    }

    public function unit()
    {
        return $this->belongsToMany(Unit::class, 'karyawan_unit');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function kehadiranHariIni()
    {
        return $this->hasOne(Kehadiran::class)->where('tanggal', date('Y-m-d'));
    }

    public function kehadiranKemarin()
    {
        $yesterday = date("Y-m-d", strtotime('-1 days'));
        return $this->hasOne(kehadiran::class)->where('tanggal', $yesterday);
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class);
    }

    public function potongan()
    {
        return $this->belongsToMany(Potongan::class, 'karyawan_potongan')->withPivot(['end_at', 'qty']);
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class);
    }

    public function keluarga()
    {
        return $this->hasMany(Keluarga::class);
    }

    public function insentif()
    {
        return $this->hasMany(Insentif::class);
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class);
    }

    public function gajiOne()
    {
        return $this->hasOne(Gaji::class)->latest('updated_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statusKerja()
    {
        return $this->belongsTo(StatusKerja::class);
    }

    public function persentaseKinerja()
    {
        return $this->belongsToMany(PersentaseKinerja::class, 'karyawan_persentase_kinerja');
    }

    public function jamPerpekan()
    {
        return $this->belongsTo(JamPerpekan::class);
    }

    public function kelompokKerja()
    {
        return $this->belongsTo(KelompokKerja::class);
    }

    // Tarif Lembur
    public function tarifLembur()
    {
        return $this->belongsTo(TarifLembur::class);
    }

    // Get gaji Pokok
    public function getGajiPokokAttribute($value)
    {
        return $this->golongan->gaji_pokok * $this->statusKerja->persentase_gaji_pokok;
    }

    // Get Tunjangan Anak
    public function getTunjAnakAttribute($value)
    {
        $anak = $this->keluarga()->tunjAnak()->get();
        $tot_persen = 0;
        foreach ($anak as $item) {
            $tot_persen += $item->statuskeluarga->persen;
        }

        return ($tot_persen * $this->gaji_pokok);
    }

    // Get Tunjangan Istri
    public function getTunjIstriAttribute($value)
    {
        if ($this->jenis_kelamin == 'L' && $this->status_pernikahan == 'M') {
            $istri = $this->keluarga()->tunjIstri()->get();
            $tot_persen = 0;
            foreach ($istri as $item) {
                $tot_persen += $item->statuskeluarga->persen;
            }

            return ($tot_persen * $this->gaji_pokok);
        } else {
            return 0;
        }
    }

    // Get Jml Anak
    public function getJmlAnakAttribute($value)
    {
        return $this->keluarga()->anak()->count();
    }

    // Get Jml Istri
    public function getJmlIstriAttribute($value)
    {
        return $this->keluarga()->istri()->count();
    }

    // Get Tunjangan Pendidikan Anak
    public function getTunjPendidikanAnakAttribute($value)
    {
        return $this->keluarga()->tunjPendidikanAnak()->sum('tunjangan_pendidikan');
    }

    // Get Tunjangan Jabatan
    public function getTunjJabatanAttribute()
    {
        return $this->jabatan()->sum('tunjangan_jabatan');
    }

    public function sumLoad()
    {
        return $this->jabatan()->sum('load');
    }

    // Get Tunjangan Struktural
    public function getTunjStrukturalAttribute($value)
    {
        if ($this->status == 1) {
            $load = ($this->sumLoad() + $this->jamPerpekan->jml_jam_ngajar) - $this->jamPerpekan->jml_jam;

            return $load > 0 ? ($load * setting('tarif_load')) : 0;
        }

        return ($this->sumLoad() * setting('tarif_load'));
    }

    // Get Tunjangan Fungsional
    public function getTunjFungsionalAttribute($value)
    {
        return ($this->gaji_pokok * $this->kelompokKerja->persen);
    }

    // get Tunj Kinerja
    public function scopeTunjKinerja($query, $data, $bln)
    {
        $get = $this->gajiOne()->bulan($bln)->first();

        if (!empty($get)) {
            return $get->resultKinerja($data);
        }

        return 0;
    }

    public function getPotonganArrayAttribute()
    {
        $toArray = [];

        foreach ($this->potongan as $item) {
            if ($item->type !== 'decimal') {
                $arr = explode('*&', $item->jumlah_potongan);

                switch ($arr[1]) {
                    case 'GATOT':
                        $jml = $arr[0] * $this->gaji_total;
                        $toArray[] = [
                            'rekening_id' => $item->rekening_id,
                            'nama' => $item->nama_potongan,
                            'jumlah' => $jml
                        ];
                        break;

                    case 'GAFUN':
                        $jml = $arr[0] * ($this->gaji_pokok + $this->tunj_fungsional);
                        $toArray[] = [
                            'rekening_id' => $item->rekening_id,
                            'nama' => $item->nama_potongan,
                            'jumlah' => $jml
                        ];
                        break;

                    default:
                        dd($arr[1] . ' undefined');
                        break;
                }
            } else {
                $jml = $item->jumlah_potongan;
                $toArray[] = [
                    'rekening_id' => $item->rekening_id,
                    'nama' => $item->nama_potongan,
                    'jumlah' => $jml
                ];
            }
        }

        return $toArray;
    }

    // Get poTongan Karyawan $data == Karyawan
    public function getSumPotonganAttribute()
    {
        $result = 0;

        foreach ($this->potongan as $item) {
            if ($item->type !== 'decimal') {
                $arr = explode('*&', $item->jumlah_potongan);

                switch ($arr[1]) {
                    case 'GATOT':
                        $jml = $arr[0] * $this->gaji_total;
                        $result += $jml;
                        break;

                    case 'GAFUN':
                        $jml = $arr[0] * ($this->gaji_pokok + $this->tunj_fungsional);
                        $result += $jml;
                        break;

                    default:
                        $result = 0;
                        break;
                }
            } else {
                $jml = $item->jumlah_potongan;
                $result += $jml;
            }
        }

        return $result;
    }

    public function getMaksJamLemburAttribute($value)
    {
        $exc = config('var.id_status_kerja_tanpa_lembur');
        $result['day'] = 0;
        $result['week'] = 0;
        $result['holi'] = 0;

        if (in_array($this->status_kerja_id, $exc)) {
            return $result;
        } else {
            $result['day'] = $this->statusKerja->maks_jam_lembur_day;
            $result['week'] = $this->statusKerja->maks_jam_lembur_week;
            $result['holi'] = 0;
            return $result;
        }
    }
}
