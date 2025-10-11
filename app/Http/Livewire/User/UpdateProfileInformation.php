<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformation extends Component
{
    use WithFileUploads;
    public $photo;
    public $email = '';
    public $username = '';
    public $photoPreview = null;
    public $photoName = null;
    public $isEmailChanged = false;

    public function mount(){        
        $this->username = auth()->user()->username;
        $this->email = auth()->user()->email;
    }

    protected $listeners = [
        'deletedPhoto' => '$refresh',
        'saved' => '$refresh',
    ];


    protected function rules () {
        return [
            'photo' => [Rule::excludeIf(!$this->photo), 'image','max:2000'],
            'email' => ['required','email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'username' => 'required|string'
        ];
    }

    public function updateProfileInformation(){
        $this->validate();
        $path = auth()->user()->profile_photo_path;

        if($this->photo){
            if($path){
                Storage::disk('public')->delete(auth()->user()->profile_photo_path);
            }
            $path = $this->photo->storePublicly('profile-photos','public');            
        }

        $user = User::find(auth()->user()->id);
        if($user->email !== $this->email){
            $user->email_verified_at = null;
            $this->isEmailChanged = true;
        }
        $user->email = $this->email;
        $user->username = $this->username;
        $user->profile_photo_path = $path;
        $user->save();

        $this->dispatch('saved');
        
        if($this->isEmailChanged){                       
            $user->sendEmailVerificationNotification();
        }            
    }

    public function deleteProfilePhoto(){        
        Storage::disk('public')->delete(auth()->user()->profile_photo_path);
        $user = User::find(auth()->user()->id);
        $user->profile_photo_path = null;
        $user->save();
        $this->photo = null;
        $this->photoPreview = null;
        $this->photoName = null;
        $this->dispatch('deletedPhoto');
    }

    public function sendEmailVerification(){
        auth()->user()->sendEmailVerificationNotification();
    }
    public function render()
    {
        return view('livewire.user.update-profile-information');
    }
}
