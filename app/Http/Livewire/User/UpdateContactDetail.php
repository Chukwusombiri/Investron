<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateContactDetail extends Component
{
    public $phone = '';
    public $address = '';
    public $city = '';
    public $country = '';
    public $nationality = '';
    public $addressSuggestions = [];
    public $countrySuggestions = [];
    public $nationSuggestions = [];
    public $allCountries = [
        'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil', 'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada', 'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo', 'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic', 'Democratic Republic of the Congo', 'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Ivory Coast', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Korea', 'North Macedonia', 'Norway', 'Oman', 'Pakistan', 'Palau', 'Palestine', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Vatican City', 'Venezuela', 'Vietnam', 'Yemen', 'Zambia', 'Zimbabwe'
    ];

    protected function rules()
    {
        $rules = [
            'phone' => ['required', 'regex:/^\+?[0-9]{1,4}?[-.\s]?(\(?\d{1,3}?\))?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string', Rule::in($this->allCountries)],
            'nationality' => ['required', 'string',Rule::in($this->allCountries)],
        ];
        return $rules;
    }

    public function mount()
    {
        $this->phone = auth()->user()->phone ?? '';
        $this->address = auth()->user()->address ?? '';
        $this->country = auth()->user()->country ?? '';
        $this->city = auth()->user()->city ?? '';
        $this->nationality = auth()->user()->nationality ?? '';
    }
    public function updatedAddress()
    {
        $response =  Http::get("https://api.mapbox.com/search/searchbox/v1/forward?q=" . urlencode($this->address) . "&language=en&limit=9&access_token=" . config('app.mapbox'));
        $data = $response->json();
        // Check if the response is successful and contains features
        if ($response->successful() && isset($data['features'])) {
            // Extract suggestions from features
            $this->addressSuggestions = collect($data['features'])->map(function ($feature) {
                $location = $feature['properties'];
                return $location['full_address'] ?? $location['place_formatted'];
            })->toArray();
        } else {
            // Clear suggestions if no valid response is received
            $this->addressSuggestions = [];
        }
    }

    public function updatedCountry()
    {
        $this->countrySuggestions = collect($this->allCountries)->filter(function ($country) {
            return stripos($country, $this->country) !== false;
        })->toArray();
    }

    public function updatedNationality()
    {
        $this->nationSuggestions = collect($this->allCountries)->filter(function ($country) {
            return stripos($country, $this->nationality) !== false;
        })->toArray();
    }

    public function setCountry($value, $field)
    {
        if ($field === 'country') {
            $this->country = $value;
            $this->countrySuggestions = [];
        }

        if ($field === 'nationality') {
            $this->nationality = $value;
            $this->nationSuggestions = [];
        }
    }

    public function setAddress($value)
    {
        $this->address = $value;
        $this->addressSuggestions = [];
    }

    public function save()
    {
        $this->validate();

        try {
            $user = \App\Models\User::findOrFail(auth()->user()->id);
            $user->phone = $this->phone;
            $user->address = $this->address;
            $user->city = $this->city;
            $user->country = $this->country;
            $user->nationality = $this->nationality;
            $user->update();

            $this->dispatch('saved');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('error', 'Oops! Something went wrong, try again.');
        }
    }

    public function render()
    {
        return view('livewire.user.update-contact-detail');
    }
}
