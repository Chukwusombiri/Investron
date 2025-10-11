<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Livewire\Component;

class UserProfile extends Component
{
    use WithFileUploads;

    public $photo;
    public $username = '';
    public $email = '';
    public $first_name = '';
    public $last_name = '';
    public $age = '';
    public $gender = '';
    public $phone = '';
    public $marital_status ='';
    public $occupation ='';
    public $address ='';
    public $country ='';
    public $city ='';
    public $nationality ='';    
    public ?User $user = null;
    
    protected $listeners = [
        'removedPhoto'=>'$refresh',
        'userUpdated'=>'$refresh',     
    ];

    public function mount($sentId){        
        $this->user =User::find($sentId);  
        $this->username = $this->user->username;        
        $this->email = $this->user->email;        
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->age = $this->user->age;
        $this->gender = $this->user->gender;
        $this->phone = $this->user->phone;
        $this->marital_status = $this->user->marital_status; 
        $this->occupation = $this->user->occupation;
        $this->country = $this->user->country;
        $this->city = $this->user->city;
        $this->nationality = $this->user->nationality;
        $this->address = $this->user->address;
    }
    
    public function removeImage(){
        $user = User::find($this->user->id);
        if($user->profile_photo_path!==null){
            Storage::disk('public')->delete($user->profile_photo_path);    
            $user->profile_photo_path = null;
            $user->save();  
            $this->dispatch('removedPhoto'); 
            return redirect()->route('admin.user.edit',[$this->user->id]);  
        }      
    }

    public function savePersonal(){
       $this->validate([
        'username' => ['required', 'string', 'max:255'],
        'first_name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users','email')->ignore($this->user->id)],           
        'photo'=>[Rule::excludeIf(!$this->photo),'image','max:2000'],   
       ]);
             
       $this->user->username = $this->username;
       $this->user->email = $this->email;    
       $this->user->first_name=$this->first_name;
       $this->user->last_name=$this->last_name;      

       if($this->photo){
        if($this->user->profile_photo_path!==null){
            Storage::disk('public')->delete($this->user->profile_photo_path);
        }
        $this->user->profile_photo_path = $this->photo->store('profile-photos','public');
       }
       $this->user->save();

       $this->dispatch('savedPersonal');
    }

    public function saveDemographic(){
        $this->validate([
            'marital_status'=>['required','string','in:single,married,divorced,others'],
            'occupation'=>['required','string'],
            'gender' => ['required','string','in:male,female,others'],
            'age'=>'required|numeric|integer',
        ],[],[
            'marital_status' => 'Marital status',
        ]);

        $this->user->gender = $this->gender;
        $this->user->age = $this->age;
        $this->user->marital_status = $this->marital_status;
        $this->user->occupation = $this->occupation;
        $this->user->save();

        $this->dispatch('savedDemographic');
    }

    public function saveContact(){
        $this->validate([
            'address'=>['required','string'],
            'phone' => ['required', 'regex:/^\+?[0-9]{1,4}?[-.\s]?(\(?\d{1,3}?\))?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}$/'],            
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'nationality' => ['required', 'string'],
        ]);

        $this->user->address = $this->address;
        $this->user->phone = $this->phone;
        $this->user->city = $this->city;
        $this->user->country = $this->country;
        $this->user->nationality = $this->nationality;
        $this->user->save();

        $this->dispatch('savedContact');
    }

    public function render()
    {       
        return view('livewire.admin.user-profile');
    }    
}
