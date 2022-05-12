<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class NewHallRequest extends FormRequest
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
            'name' => ['required', 'string', 'unique:halls,name', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'string', 'numeric'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'average_time' => ['required', 'string', 'numeric']
        ];
    }
}
