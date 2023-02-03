<?php

namespace App\Http\Requests;

use App\Http\Traits\TJsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
            'phone' => 'required|regex:/(7\d{10})/|numeric|exists:users,phone',
            'password' => 'required|string|min:5',
        ];
    }
}
