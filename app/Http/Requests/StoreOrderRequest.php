<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'string', 'max:30'],
            "description" => ['string', 'max:100'],
            "price" => ['required', 'numeric', 'between:00.00,99.99'],
            "duration" => ['required', 'numeric'],
            "image" => ['required', "image", 'mimetypes:image/png,image/jpeg',],
            "start" => ['required', 'date'],
            "end" => ['required', 'date']
        ];
    }
}
