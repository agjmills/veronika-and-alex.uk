<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RsvpFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'attending' => 'bool',
        ];
    }
}
