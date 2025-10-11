<?php

namespace App\Http\Livewire\Admin;

use App\Models\Topic;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class CreateTopic extends ModalComponent
{
    public $title = '';

    public function save(){
        $this->validate([
            'title' => ['required','string',Rule::unique('topics','title')]
        ],[
            'unique' => 'Inputed title already belongs to another topic. Use unique title for each record.'
        ]);
        
        try{
            $topic = new Topic();
            $topic->title = $this->title;
            $topic->save();
            session()->flash('success','Topic created successfully');            
            $this->dispatch('createdTopic');
            $this->reset();

        }catch(\Throwable $th){
            session()->flash('error','Something went wrong! Contact site manager for assistance.');
            Log::error('Error updating topic: '.$th->getMessage());
        }    

    }

    public function render()
    {
        return view('livewire.admin.create-topic');
    }
}
