<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;

class ViewArticle extends Component
{
    public $article;

    public function mount(Article $sentArticle){
        $this->article = $sentArticle;
    }

    public function delete(){
        $this->article->delete();
        session()->flash('success','article was successfully deleted');
        return redirect('/admin/articles');
    }

    public function render()
    {
        return view('livewire.admin.article.view-article');
    }
}
