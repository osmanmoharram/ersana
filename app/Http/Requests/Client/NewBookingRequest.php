<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class NewBookingRequest extends FormRequest
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
            'start_date' => ['required', 'date', 'after:now'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'type' => ['required'],
            'guest_type' => ['required'],
            'food_menu' => ['required'],
            'price_type' => ['required', 'in:fixed,individual'],
            'individual_price' => ['nullable', 'numeric'],
            'number_of_guests' => ['required_with:individual_price'],
            'fixed_price' => ['nullable', 'numeric'],
            'vat' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'insurance' => ['nullable', 'numeric'],
            'total' => ['required', 'numeric'],
            'status' => ['required', 'in:confirmed,temporary'],
            'notes' => ['nullable', 'string']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'total' => $this->input('total') * 100,
            'vat' => $this->input('vat') * 100
        ]);
    }
}
