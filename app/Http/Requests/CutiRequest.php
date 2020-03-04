<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiRequest extends FormRequest
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
            'start_at' => 'required',
            'end_at' => 'required',
            'ket' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'start_at.required' => 'Tanggal dari harus diisi!',
            'end_at.required' => 'Tanggal sampai harus diisi!',
            'ket.required' => 'Keterangan harus diisi!',
        ];
    }
}
