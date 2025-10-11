<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use App\Models\Topic;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTopics extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = [
        'updatedTopic' => '$refresh',
        'createdTopic' => '$refresh'
    ];

    public function updatedSearch($value){
        $this->search = $value;
        $this->resetPage();
        $this->render();
    }

    public function clear(){
        $this->search = '';
        $this->resetPage();
    }

    public function delete($id){
        Topic::findOrFail($id)->delete();
        session()->flash('success','Topic deleted successfully');
    }

    public function render()
    {
        return view('livewire.admin.show-topics',[
            'topics' => Topic::where('title','like',"%$this->search%")->orderByDesc('created_at')->paginate(10)
        ]);
    }
}
