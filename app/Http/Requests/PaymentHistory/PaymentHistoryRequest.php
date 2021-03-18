<?php

namespace App\Http\Requests\PaymentHistory;

use Illuminate\Foundation\Http\FormRequest;

class PaymentHistoryRequest extends FormRequest
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
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email',
            'zakat'=>'required|integer',
            'sadaqah'=>'required|integer',
            'riba'=>'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required'=>'First name is required',
            'first_name.string'=>'First format is not correct',
            'last_name.required'=>'Last name is required',
            'last_name.string'=>'Last format is not correct',
            'email.required'=>'Email name is required',
            'email.email'=>'Email format is not correct',
            'zakat.required'=>'Zakat field is required',
            'zakat.integer'=>'Zakat format is not correct'
        ];
    }
}
