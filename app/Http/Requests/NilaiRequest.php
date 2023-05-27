<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NilaiRequest extends FormRequest
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
            'nama_lengkap' => 'required',
            'asal_sekolah' => 'required',
            'jenis_kelamin' => 'required',
            'akademik' => 'required',
            // 'jalan_ditempat' => 'required',
            // 'langkah_tegap' => 'required',
            // 'penghormatan' => 'required',
            // 'belok' => 'required',
            // 'hadap' => 'required',
            // 'lari' => 'required',
            // 'pushup' => 'required',
            // 'situp' => 'required',
            // 'pullup' => 'required',
            // 'tb' => 'required',
            // 'bb' => 'required',
            // 'bentuk_kaki' => 'required',
        ];
    }
}
