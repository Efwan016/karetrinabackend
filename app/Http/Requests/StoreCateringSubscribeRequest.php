<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCateringSubscribeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'post_code' => 'required|string|max:10',
            'address' => 'required|string|max:500',
            'notes'=> 'required|string|max:1000',
            'started_at' => 'required|date',
            'catering_package_id' => 'required|integer',
            'catering_tier_id' => 'required|integer',
            'proof' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
