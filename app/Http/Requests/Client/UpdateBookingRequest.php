<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->isAdmin() && $this->user()->isClient());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'start_date' => ['nullable', 'date', 'after:now'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'type' => ['required'],
            'guest_type' => ['required'],
            'food_menu' => ['required'],
            'vat' => ['nullable', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'insurance' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'status' => ['required', 'in:confirmed,temporary'],
            'notes' => ['nullable', 'string']
        ];
    }
}
