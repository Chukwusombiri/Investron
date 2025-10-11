<?php

namespace App\Http\Requests;

use App\Enums\ClientDemand;
use App\Enums\InvestableAssets;
use App\Models\Inquiry;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class StoreInquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => Auth::id(),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^\+?[0-9]{1,4}?[-.\s]?(\(?\d{1,3}?\))?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'],
            'acceptedTerms' => 'accepted',
            'acceptedNewsLetter' => 'required|boolean',
            'acceptedPartner' => 'required|boolean',
            'comment' => 'nullable|string',
            'demand' => ['required','string',new Enum(ClientDemand::class)],
            'asset' => ['required', 'string',new Enum(InvestableAssets::class)],
            'zipcode' => 'required|string',
            'advisor' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'phone.regex' => 'The phone number format is invalid. Only numbers, +, hyphens, parentheses, and spaces are allowed.',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'zipcode' => 'Zip code',
            'asset' => 'Investable assets',
            'demand' => 'Inquiry purpose',
            'comment' => 'Additional comment',
            'acceptedPartner' => 'Speak to Partner',
            'acceptedNewsLetter' => 'Promotional infos',
            'acceptedTerms' => 'Terms of use and privacy policy',
        ];
    }
}
