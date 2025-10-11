<?php

namespace App\Http\Livewire\Admin;

use App\Models\Deposit;
use App\Models\InvestmentDeposit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Receipt extends ModalComponent
{
    use WithFileUploads;
    public Deposit $investment;
    public $receipt;
    
    public function mount(Deposit $investment){
        $this->investment = $investment;
    } 

    protected function rules(){
        return [
            'receipt'=>['required','image','max:1999']
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();

        if($this->investment->receipt !=null){
            Storage::disk('public')->delete($this->investment->receipt);
        }
        $this->investment->receipt = $this->receipt->storePublicly('receipts','public');
    }

    public function delete(){
        if($this->investment->receipt !=null){
            Storage::disk('public')->delete($this->investment->receipt);
        }
    }

    public static function modalMaxWidth(): string
    {       
        return 'xl';
    }

    public function render()
    {
        return view('livewire.admin.receipt');
    }
}
