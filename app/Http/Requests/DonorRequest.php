<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonorRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:2'],
            'blood_group' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'contact' => ['required', 'string', 'size:10'],
            'address' => ['required', 'string'],
            'age' => ['required', 'integer', 'min:0'],
            'gender' => ['required', 'in:male,female'],
            'donation_interval' => ['required', 'in:3 months,6 months,1 year,irregular'],
            'donation_count' => ['required', 'integer', 'min:0'],
            'last_donation_at' => ['required', 'date'],
            'description' => ['required', 'string'],
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
