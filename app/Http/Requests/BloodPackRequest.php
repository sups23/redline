<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodPackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|min:5|max:255'
            'donor_id' => ['required', 'exists:donors,id'],
            'arrived_at' => ['required', 'date', 'before:expiry_date'],
            'expiry_at' => ['required', 'date'],
            'blood_type' => ['required', 'in:WB,PRBC,SWRBC,SDPS,FFP,PC,SDP,PRB,CT,OTH'],
            'rbc_count' => ['required', 'integer', 'min:0'],
            'wbc_count' => ['required', 'integer', 'min:0'],
            'haemo_level' => ['required', 'integer', 'min:0'],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
