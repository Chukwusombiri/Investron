<?php

namespace App\Http\Livewire\Admin;

use App\Mail\MailSendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class SendMail extends ModalComponent
{
    use WithFileUploads;
    public User $user;
    public $sjt;
    public $msg;
    public $attachee;
    public $attachee_name;

    protected function rules(){
        return [
        'sjt' => ['required','string'],
        'msg' => ['required','string'],  
        'attachee'=>[Rule::excludeIf(!$this->attachee),'file','max:2000'],
        'attachee_name'=>[Rule::excludeIf(!$this->attachee),'string']
        ];
    } 
    public function mount(User $user){
        $this->user = $user;
    }

    public static function modalMaxWith():string{
        return 'xl';
    }

    public function sendMail(){
        $this->validate();

        if($this->attachee){
            $path = $this->attachee->store('attachments');
            $this->attachee_name.='.'.$this->attachee->extension();
            Mail::to($this->user->email)->send(new MailSendMail($this->msg, $this->sjt,$path,$this->attachee_name));
        }else{
            Mail::to($this->user->email)->send(new MailSendMail($this->msg, $this->sjt));
        }                
        $this->closeModalWithEvents(['sentMail']);
    }
    public function render()
    {
        return view('livewire.admin.send-mail');
    }
}
