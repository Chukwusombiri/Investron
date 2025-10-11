<?php

namespace App\Http\Livewire\Admin;

use App\Mail\SendEmailMessage;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SendEmail extends Component
{
    public $recipients = [];
    public $newRecipient = '';
    public $subject = '';
    public $body = '';
    public $isBulk = 'no';
    public $allUsers = [];
    protected function rules(){
        return [
            'recipients' => ['required','array'],
            'recipients.*' => ['required','email'],            
            'subject' => ['required','string'],
            'body' => ['required','string'],
        ]; 
    } 

    protected $validationAttributes = [
        'newRecipient' => 'New recipient',
        'recipients.*' => 'Recipient email address'
    ];

    public function mount($sentRecipients){        
        if(is_array($sentRecipients)){
            foreach ($sentRecipients as $value) {
                $this->recipients[]=$value;
            }
        }

        if(session()->get('isBulk')){
            $this->isBulk = session('isBulk');            
        }
    }    

    public function handleFocus(){
        $this->allUsers = User::select('username','email')->get();
    }

    public function updatedNewRecipient(){
        $this->allUsers = User::where('username','like','%'.$this->newRecipient.'%')
                                ->orWhere('email','like','%'.$this->newRecipient.'%')
                                ->get();
    }

    public function setUser($email){
        $this->newRecipient = $email;
        $this->allUsers = [];
    }

    public function addRecipient(){
        $this->validate([
            'newRecipient' => ['required','email',Rule::notIn($this->recipients),],
        ]);
        $this->recipients[] = $this->newRecipient;
        $this->newRecipient = '';    
        $this->dispatch('addedRecipient');
    }

    public function removeRecipient($index){
        unset($this->recipients[$index]);
    }

    public function sendEmail(){        
        $this->validate();
        try {
            $data = [
                'subject'=>$this->subject,
                'body'=>$this->body,
            ];
            foreach ($this->recipients as $key => $value) {
                Mail::to($value)->send(new SendEmailMessage($data));
            }            
            $this->dispatch('EmailSent');
            if(session()->has('isBulk')){
                session()->forget('isBulk');
            }
            $this->reset();
        } catch (\Throwable $th) {
            throw $th;
            Log::info('Unable to send email: '.$th->getMessage());
           $this->dispatch('actionFailed');
        }       
    }
        
    public function render()
    {       
        return view('livewire.admin.send-email');
    }
}
