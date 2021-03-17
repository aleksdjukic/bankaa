<?php

namespace App\Http\Livewire;


use Livewire\Component;

class News extends Component
{
    public function render()
    {
        $news = \App\Models\News::orderBy('id', 'asc')->get();
        return view('livewire.news',[
            'news' => $news
        ]);

    }
}
