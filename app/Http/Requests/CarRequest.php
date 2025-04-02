<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CarRequest extends FormRequest
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
            "brand"=>"required|max:50",
            "model"=>"required|max:50",
            "lincensePlate"=>["required","regex:/^[A-Z]{3}-[0-9]{3}$/"],
            "year"=>"required|integer|min:2000|max:2025",
            "dailyPrice"=>"required|numeric|between:100,2000",
        ];
    }
    public function failedValidation( Validator $validator ) {
 
        throw new HttpResponseException( response()->json([
            "success" => false,
            "message" => "Adatbeviteli hiba",
            "error" => $validator->errors()
        ]));
    }
}
