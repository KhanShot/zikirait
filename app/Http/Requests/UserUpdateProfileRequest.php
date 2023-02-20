<?php

namespace App\Http\Requests;

use App\Http\Traits\TJsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
{
    use TJsonResponse;
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
            'name' => 'string',
            'phone' => 'regex:/(7\d{10})/|numeric|unique:users,phone,'. $this->user()->id,
            'username' => 'string|unique:users,phone,'. $this->user()->id,
        ];
    }
}
