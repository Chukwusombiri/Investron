<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        return view('admin.insight.article.index');
    }

    public function create(){
        return view('admin.insight.article.create');
    }
    
    public function show($slug){
        $article = Article::where('slug',$slug)->first();
        if(! $article){
            return redirect()->back()-with('error','Oops!! We couldn\'t find the article.');
        }
        return view('admin.insight.article.view_article')->with('id', $article->id);
    }   
    
    public function edit($slug){
        $article = Article::where('slug',$slug)->first();
        if(! $article){
            return redirect()->back()-with('error','Oops!! We couldn\'t find the article.');
        }
        return view('admin.insight.article.edit_article')->with('id', $article->id);
    }
}
