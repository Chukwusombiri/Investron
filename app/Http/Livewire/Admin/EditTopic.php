<?php

namespace App\Http\Livewire\Admin;

use App\Models\Topic;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use LivewireUI\Modal\ModalComponent;

class EditTopic extends ModalComponent
{
    public Topic $topic; 
    public $title = '';  
    
    public function mount(){
        $this->title = $this->topic->title;
    }

    public function save(){
        $this->validateOnly('title',[
            'title' => ['required','string',Rule::unique('topics','title')->ignore($this->topic->id)]
        ],[
            'unique' => 'Inputed title already belongs to another topic. Use unique title for each record.'
        ]);

        try{
            $topic = Topic::find($this->topic->id);
            $topic->title = $this->title;
            $topic->save();
            session()->flash('success','Topic updated successfully');
            $this->dispatch('updatedTopic');

        }catch(\Throwable $th){
            session()->flash('error','Something went wrong! Contact site manager for assistance.');
            Log::error('Error updating topic: '.$th->getMessage());
        }    

    }
    public function render()
    {
        return view('livewire.admin.edit-topic');
    }
}
