<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalonPaskibrakaRequest extends FormRequest
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
            'periode' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'no_telp' => 'required|numeric',
        ];
    }

    public function messages() {
        return [
            'periode.required' => 'Periode wajib diisi.',
            'name.required' => 'Nama wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'asal_sekolah.required' => 'Asal Sekolah wajib diisi.',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi.',
            'tgl_lahir.required' => 'Tangaal Lahir wajib diisi.',
            'no_telp.required' => 'No Telepon wajib diisi.',
            'no_telp.numeric' => 'No Telepon harus angka.'
        ];
    }
}
