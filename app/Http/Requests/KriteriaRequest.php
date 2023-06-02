<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Model\Kriteria;

class KriteriaRequest extends FormRequest
{
    protected $id;

    public function __construct(Request $request) {
        $this->id = (integer) $request->route()->update_kriteria;
    }
    
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
            'aspek_id' => 'required',
            'simbol' => 'required|unique:tb_kriteria,simbol,' .  $id,
            'kriteria' => 'required|unique:tb_kriteria,kriteria, ' . $id,
            'nilai_target' => 'required',
            'kelas' => 'required',
        ];
    }

    public function messages() {
        return [
            'aspek_id.required' => 'Aspek wajib diisi.',
            'simbol.required' => 'Simbol wajib diisi.',
            'simbol.unique' => 'Simbol ini telah tersedia.',
            'kriteria.required' => 'Kriteria wajib diisi.',
            'kriteria.unique' => 'Kriteria telah tersedia.',
            'nilai_target.required' => 'Nilai target wajib diisi.',
            'kelas.required' => 'Kelas wajib diisi.'
        ];
    }
}
