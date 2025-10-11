<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CreatePlan extends Component
{
    public $name = '';
    public $duration = '';
    public $min = '';
    public $max = '';
    public $perMonInt = '';
    public $features = [];
    public $newFeature = '';   

    protected function rules(){
        $rules = [
            'name' => ['required','string','unique:plans,name,'],
            'duration' => ['required','numeric','integer'],
            'min' => ['required','numeric','integer'],
            'max' => ['required','numeric','integer'],
            'features' => ['required','array',],
            'features.*' => ['required','string'],
            'perMonInt' => ['required','numeric',],
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
            $plan = new \App\Models\Plan();
            $plan->name = $this->name;
            $plan->duration = $this->duration;
            $plan->min = $this->min;
            $plan->max = $this->max;
            $plan->perMonInt = $this->perMonInt;
            $plan->features = json_encode($this->features);
            $plan->save();
            $this->dispatch('createdPlan');
            $this->reset();
        } catch (\Throwable $th) {
            Log::error('Unable to create plan: '.$th);
            $this->dispatch('createPlanFailed');
        }        
    }
    public function render()
    {
        return view('livewire.admin.create-plan');
    }
}
