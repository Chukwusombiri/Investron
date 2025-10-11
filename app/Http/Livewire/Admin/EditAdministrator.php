<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditAdministrator extends Component
{
    use WithFileUploads;

    public $username = '';
    public $email = '';
    public $password = '';
    public $admin_role = '';
    public $isSuspended = false;
    public $password_confirmation = '';
    public $photo;
    public Admin $admin;
    public $roles = [
        'Super Admin'=>'super_admin',
        'Operation manager'=>'operation_manager',
        'Moderator'=>'moderator',
        'Content manager'=>'content_manager',
        'Support assistance'=>'support_assistance'
    ];

    protected function rules(){
        return  [
            'username' => ['required','string'],
            'email' => ['required','email'],
            'password' => ['string','confirmed'],
            'admin_role' => ['required','string',Rule::in(array_values($this->roles))],
            'photo'=>[Rule::excludeIf(!$this->photo),'image','max:2000'],
        ];
    }

    protected $validationAttributes = [
        'admin_role' => 'Admin role',
    ];

    protected $listeners = [
        'removedPhoto'=>'$refresh',
        'updatedAdmin'=>'$refresh',      
    ];

    public function mount($sentAdmin){
        $this->admin = Admin::findOrFail($sentAdmin);
        $this->username = $this->admin->name;
        $this->email = $this->admin->email;
        $this->admin_role = $this->admin->admin_role;
        $this->isSuspended = $this->admin->isSuspended;
    }

    public function removeImage(){       
        if($this->admin->profile_photo_path!==null){
            Storage::disk('public')->delete($this->admin->profile_photo_path);    
            $this->admin->profile_photo_path = null;
            $this->admin->save();  
            $this->dispatch('removedPhoto'); 
        }      
    }

    public function save(){
        $this->validate();

        $this->admin->name = $this->username;
        $this->admin->email = $this->email;
        if($this->password!==''){
            $this->admin->password = Hash::make($this->password);
        }        
        $this->admin->admin_role = $this->admin_role;
        $this->admin->isSuspended = $this->isSuspended;
        if($this->photo){
            if($this->admin->profile_photo_path!==null){
                Storage::disk('public')->delete($this->admin->profile_photo_path);
            }
            $this->admin->profile_photo_path = $this->photo->store('admin-photos','public');
        }
        $this->admin->save();
        $this->dispatch('updatedAdmin');
    }
    public function render()
    {
        return view('livewire.admin.edit-administrator');
    }
}
