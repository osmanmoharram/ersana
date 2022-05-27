<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisementRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'start_date' => ['required', 'date', 'after:now'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'price' => ['required', 'numeric'],
            'status' => ['required', 'in:active,suspended'],
            'owner_name' => ['required', 'string'],
            'owner_phone' => ['required', 'string'],
            'business_field_id' => ['requird', 'exists:business_fields,id']
        ];
    }
}
