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
            'customer' => ['required', 'array'],
            'customer.name' => ['required', 'string'],
            'customer.email' => ['required', 'email', 'string'],
            'customer.phone' => ['required', 'string'],
            'date' => ['nullable', 'date'],
            'bookingTime_id' => ['nullable', 'exists:booking_times,id'],
            'offer_id' => ['required', 'exists:offers,id'],
            'payment_method' => ['required', 'in:bank,cash'],
            'paid_amount' => ['required', 'numeric'],
            'remaining_amount' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'status' => ['required', 'in:confirmed,temporary,paid,canceled'],
            'notes' => ['nullable', 'string']
        ];
    }
}
