<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (! $this->user()->isClient()) && ($this->user()->isAdmin() || $this->user()->id === $this->request->user->id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', Rule::unique('users')->ignore($this->user()->id, 'id')],
            'role' => ['required', 'exists:roles,title'],
            'profile_picture' => ['nullable', 'image']
        ];
    }
}
