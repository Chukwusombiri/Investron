<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPlan extends Component
{
    public $name = '';
    public $duration = '';
    public $min = '';
    public $max = '';
    public $perMonInt = '';
    public ?Plan $plan = null;
    public $features = [];
    public $newFeature = '';

    public function mount($sentPlan){
        $this->plan = Plan::find($sentPlan);
        $this->name = $this->plan->name;
        $this->duration = $this->plan->duration;
        $this->min = $this->plan->min;
        $this->max = $this->plan->max;
        $this->perMonInt = $this->plan->perMonInt;
        $this->features = json_decode($this->plan->features,true);
    }

    protected function rules(){
        $rules = [
            'name' => ['required','string','unique:plans,name,'.$this->plan->id,],
            'duration' => ['required','numeric','integer'],
            'min' => ['required','numeric','integer'],
            'max' => ['required','numeric','integer'],
            'features' => ['required','array',],
            'features.*' => ['required','string'],
            'perMonInt' => ['required','numeric','integer'],
        ];

        return $rules;
    } 

    public function addFeature(){
        $this->validate([
            'newFeature' => ['required','string'],
        ]);
        $this->features[] = $this->newFeature;
        $this->newFeature = '';    
        $this->dispatch('addedFeature');
    }

    public function removeFeature($index){
        unset($this->features[$index]);
    }

    public function save(){
        $this->validate();
        try {
            $this->plan->name = $this->name;
            $this->plan->duration = $this->duration;
            $this->plan->min = $this->min;
            $this->plan->max = $this->max;
            $this->plan->perMonInt = $this->perMonInt;
            $this->plan->features = json_encode($this->features);
            $this->plan->save();
            $this->dispatch('updatedPlan');
        } catch (\Throwable $th) {
            Log::error('Unable to update plan: '.$th);
            $this->dispatch('updatePlanFailed');
        }        
    }

    public function render()
    {
        return view('livewire.admin.edit-plan');
    }
}
