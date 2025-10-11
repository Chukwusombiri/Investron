<?php

namespace App\Http\Livewire\User;

use App\Models\Deposit;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class DepositReceipt extends Component
{
    Use WithFileUploads;
    public $photo;  
    public Deposit $deposit;

    public function mount($sentDeposit){
        $this->deposit = Deposit::find($sentDeposit);
    }

    protected function rules(){
        return [            
            'photo'=>['required','image','max:2000'],
        ];
    } 

    public function save(){
        $this->validate();

        try{       
            if($this->deposit->receipt){
                Storage::disk('public')->delete($this->deposit->receipt);
            }
            $this->deposit->receipt = $this->photo->store('deposit-receipt','public');                
            $this->deposit->save();
            session()->flash('success','Good job! receipt upload was successful');
            $this->photo = null;
        }catch(\Throwable $th){
            Log::error('Receipt upload failed: '.$th->getMessage());
            session()->flash('error','Oops! Unable to upload receipt');
        }
    }

    public function render()
    {
        return view('livewire.user.deposit-receipt');
    }
}
