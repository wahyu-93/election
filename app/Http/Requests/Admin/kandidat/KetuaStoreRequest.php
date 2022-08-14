<?php

namespace App\Http\Requests\Admin\kandidat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class KetuaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nkk'   => 'required|numeric',
            'nik'   => 'required|numeric|unique:nik',
            'name'  => 'required',
            'visi'  => 'required',
            'misi'  => 'required',
            'fotoKandidat' => 'required|mimes:jpg, jpeg, png'
        ];
    }
}
