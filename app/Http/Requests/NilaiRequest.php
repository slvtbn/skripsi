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
        $id = $this->method() == 'PUT' ? $this->route('id') : null;

        return [
            'calon_paskibraka_id' => 'required|unique:tb_nilai,calon_paskibraka_id,' . $id,
            'akademik' => 'required|numeric',
            'jalan_ditempat' => 'required|numeric',
            'langkah_tegap' => 'required|numeric',
            'penghormatan' => 'required|numeric',
            'belok' => 'required|numeric',
            'hadap' => 'required|numeric',
            'lari' => 'required|numeric',
            'pushup' => 'required|numeric',
            'situp' => 'required|numeric',
            'pullup' => 'required|numeric',
            'tb' => 'required|numeric',
            'bb' => 'required|numeric',
            'bentuk_kaki' => 'required',
        ];
    }

    public function messages() {
        return [
            'calon_paskibraka_id.required' => 'Nama wajib diisi.',
            'calon_paskibraka_id.unique' => 'Nama calon paskibra sudah tersedia.',
            'akademik.required' => 'Akademik wajib diisi.',
            'akademik.numeric' => 'Nilai akademik wajib angka.',
            'jalan_ditempat.required' => 'Nilai jalan ditempat wajib diisi.',
            'jalan_ditempat.numeric' => 'Nilai jalan ditempat wajib angka.',
            'langkah_tegap.required' => 'Nilai langkah tegap wajib diisi.',
            'langkah_tegap.numeric' => 'Nilai langkah tegap wajib angka.',
            'penghormatan.required' => 'Nilai penghormatan wajib diisi.',
            'penghormatan.numeric' => 'Nilai penghormatan wajib angka.',
            'belok.required' => 'Nilai belok wajib diisi.',
            'belok.numeric' => 'Nilai belok wajib angka.',
            'hadap.required' => 'Nilai hadap wajib diisi.',
            'hadap.numeric' => 'Nilai hadap wajib angka.',
            'lari.required' => 'Nilai lari wajib diisi.',
            'lari.numeric' => 'Nilai lari wajib angka.',
            'push_up.required' => 'Nilai pushup wajib diisi.',
            'push_up.numeric' => 'Nilai pushup wajib angka.',
            'sit_up.required' => 'Nilai situp wajib diisi.',
            'sit_up.numeric' => 'Nilai situp wajib angka.',
            'pull_up.required' => 'Nilai pullup wajib diisi.',
            'pull_up.numeric' => 'Nilai pullup wajib angka.',
            'tb.required' => 'Nilai tinggi badan wajib diisi.',
            'tb.numeric' => 'Nilai tinggi badan wajib angka.',
            'bb.required' => 'Nilai berat badan wajib diisi.',
            'bb.numeric' => 'Nilai berat badan wajib angka.',
            'bentuk_kaki.required' => 'Nilai bentuk kaki wajib diisi.',
        ];
    }
}
