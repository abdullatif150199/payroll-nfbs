<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KaryawanFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_lengkap' => 'required|min:2|max:150',
            'jenis_kelamin' => 'required',
            'nik' => 'required|min:16|max:16',
            'tempat_lahir' => 'required|min:2|max:100',
            'tanggal_lahir' => 'required',
            'status_pernikahan' => 'required',
            'no_hp' => 'required|min:9|max:18',
            'alamat' => 'required|min:10|max:500',
            'tanggal_masuk' => 'required',
            'status_kerja' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'bidang' => 'required',
            'unit' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'Nama Lengkap harus di isi!',
            'nama_lengkap.min' => 'Nama Lengkap terlalu pendek',
            'nama_lengkap.mix' => 'Nama Lengkap maksimal 150 karakter',
            'jenis_kelamin' => 'Pilih Jenis Kelamin!',
            'nik.required' => 'NIK harus di isi!',
            'nik.min' => 'NIK harus 16 karakter',
            'nik.mix' => 'NIK harus 16 karakter',
            'tempat_lahir.required' => 'Tempat Lahir harus di isi!',
            'tempat_lahir.min' => 'Nama Tempat Lahir terlalu pendek',
            'tempat_lahir.max' => 'Nama Tempat Lahir maksimal 100 karakter',
            'tanggal_lahir.required' => 'Tanggal Lahr harus di isi!',
            'status_pernikahan.required' => 'Status Pernikahan harus di isi!',
            'no_hp.required' => 'No HP harus di isi!',
            'no_hp.min' => 'No HP terlalu pendek',
            'no_hp.mix' => 'No HP terlalu Panjang',
            'alamat.required' => 'Alamat harus di isi!',
            'alamat.min' => 'Alamat terlalu pendek',
            'alamat.max' => 'Alamat maksimal 500 karakter',
            'tanggal_masuk.required' => 'Tanggal Masuk harus di isi!',
            'status_kerja.required' => 'Pilih Status Kerja!',
            'golongan.required' => 'Pilih Golongan!',
            'jabatan.required' => 'Pilih Jabatan!',
            'bidang.required' => 'Pilih Bidang!',
            'unit.required' => 'Pilih Unit!'      
        ];
    }
}
