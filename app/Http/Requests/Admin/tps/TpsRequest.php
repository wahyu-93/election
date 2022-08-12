<?php

namespace App\Http\Requests\Admin\tps;

use App\Models\Desa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TpsRequest extends FormRequest
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
            'kecamatan' => 'required',
            'desa' => 'required',
            'tps' => ['required','numeric','min:1','max:50',Rule::unique('tps')->where('desa_id', $this->desa)]
        ];
    }
}
